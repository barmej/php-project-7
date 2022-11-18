<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Store;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::where([['user_id', '=', auth()->user()->id], ['status', '!=', 'failed']])->get();
        $transactionIds = array();
        $products = array();
        $status = array();
        $IDs = array();
        $transactionIds[] = $orders[0]->transaction_id;;
        foreach ($orders as $item)
        {
            if (!in_array($item->transaction_id, $transactionIds))
            {
                $transactionIds[] = $item->transaction_id;
            }
        }
        $filteredOrders = array();
        foreach ($transactionIds as $transactionId)
        {
            $ordersByTrans = Order::where('transaction_id', '=', $transactionId)->get();
            $filteredOrders[] = $ordersByTrans[0];
            $sum = 0;
            $orderStatus = array();
            foreach ($ordersByTrans as $order)
            {
                $sum += sizeof($order->products);
                $orderStatus [] = $order->status;
                $IDs[] = $order->id;
            }
            $products[] = $sum;
            $status [] = $orderStatus;
        }

        $delivered = array();
        foreach ($status as $entireOrderStatus)
        {
            if (!in_array('shipped', $entireOrderStatus) && !in_array('paid', $entireOrderStatus) && !in_array('pending', $entireOrderStatus))
                $delivered[] = 1; //delivered
            else if (!in_array('delivered', $entireOrderStatus) && !in_array('paid', $entireOrderStatus) && !in_array('pending', $entireOrderStatus))
                $delivered[] = 2; //all shipped
            else
                $delivered[] = 0;

        }

        return view('orders.myOrders', compact('filteredOrders', 'products', 'IDs', 'delivered'));

    }

    public function myOrdersDetails($transactionId)
    {
        $IDs = array();
        $products = array();
        $status = array();
        $orders = Order::where('transaction_id', '=', $transactionId)->get();
        foreach ($orders as $order)
        {
            foreach ($order->products as $product)
            {
                $IDs[] = $order->id;
                $products[] = $product;
                $status[] = $order->status;
            }
        }

        $total = 0;
        foreach ($products as $product)
            $total += $product['price'] * $product['quantity'];

        return view('orders.myOrdersDetails', compact('IDs', 'products', 'total', 'status'));
    }

    public function storesOrders()
    {

        $stores = auth()->user()->stores;
        $storesID = array();
        foreach ($stores as $store)
        {
            $storesID[] = $store->id;
        }

        $allOrders = array();
        foreach ($storesID as $storeId)
        {
            $orders = Order::where([['store_id', '=', $storeId], ['status', '!=', 'failed']])->get();
            if (sizeof($orders) > 0)
            {
                $allOrders[] = $orders;
            }
        }

        return view('orders.storesOrders', compact('allOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myCart()
    {
        //create function
        if (!session()->has('currentOrders'))
            return redirect('/');
        $total = 0;
        foreach (session('currentOrders') as $product)
        {
            $total = $total + ($product->price * $product->quantity);
        }

        return view('orders.mycart', compact('total'));
    }


    public function shipped(Order $order)
    {
        if ($order->status != 'paid' && $order->status != 'pending')
            return view('message', ['message' => __('messages.statuswarning')]);
        $order->status = "shipped";
        $order->save();

        return back();

    }

    public function delivered(Order $order)
    {
        if ($order->status != 'shipped')
            return view('message', ['message' => __('messages.statuswarning')]);
        $order->status = "delivered";
        $order->save();

        return back();

    }


    public function chargeRequest(OrderRepository $orderRepository)
    {
        $name = auth()->user()->id;
        $email = auth()->user()->email;
        $phone = auth()->user()->phone;
        $total = 0;
        foreach (session('currentOrders') as $product)
        {
            $total = $total + ($product->price * $product->quantity);
        }
        if (empty(auth()->user()->address))
            return view('customError');

        if (!session()->has('currentOrders'))
            return view('customError');

        return redirect($orderRepository->getChargeRequest($total, $name, $email, $phone));
    }

    public function chargeUpdate(OrderRepository $orderRepository)
    {

        $response = $orderRepository->validateRequest(request()->tap_id);
        $order = session('currentOrders');
        $storesIds = array();
        $storesIds[] = $order[0]->store_id;
        foreach ($order as $item)
        {
            if (!in_array($item->store_id, $storesIds))
            {
                $storesIds[] = $item->store_id;
            }
        }

        foreach ($storesIds as $storeId)
        {
            $productsByID = array();
            foreach ($order as $product)
            {
                if ($product->store_id == $storeId)
                {
                    $productsByID[] = $product;
                }
            }

            $newOrder = new Order();
            $products = session('currentOrders');
            $newOrder->products = $productsByID;
            $newOrder->transaction_id = request()->tap_id;;
            if ($response['status'] == 'CAPTURED')
                $newOrder->status = 'paid';
            else
                $newOrder->status = 'failed';
            $newOrder->user_id = auth()->user()->id;
            $newOrder->store_id = $storeId;
            $newOrder->payment_type = 'VISA';
            $newOrder->save();

        }

        $status = $response["status"];

        return view('orders.paymentResult', compact('status'));
    }


    public function cash()
    {

        $order = session('currentOrders');
        $random = '';
        for ($i = 0; $i < 8; $i ++)
        {
            $number = rand(0, 9);
            $random .= strval($number);
        }

        $storesIds = array();
        $storesIds[] = $order[0]->store_id;
        foreach ($order as $item)
        {
            if (!in_array($item->store_id, $storesIds))
            {
                $storesIds[] = $item->store_id;
            }
        }

        foreach ($storesIds as $storeId)
        {
            $productsByID = array();
            foreach ($order as $product)
            {
                if ($product->store_id == $storeId)
                {
                    $productsByID[] = $product;
                }
            }

            $newOrder = new Order();
            $products = session('currentOrders');
            $newOrder->products = $productsByID;
            $newOrder->transaction_id = $random;
            $newOrder->status = 'pending';
            $newOrder->user_id = auth()->user()->id;
            $newOrder->store_id = $storeId;
            $newOrder->payment_type = 'CASH';
            $newOrder->save();

        }

        $status = $newOrder->status;

        return view('orders.paymentResult', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        $total = 0;
        foreach ($order->products as $product)
        {
            $total += $product['price'] * $product['quantity'];
        }

        return view('orders.show', compact('order', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {

    }

    public function addIdea(Product $product)
    {
        $validateDate = request()->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $currentOrders = session()->has('currentOrders') ? session('currentOrders') : array();
        $alreadyExist = false;
        foreach ($currentOrders as $order)
        {
            if ($order->id == $product->id && $order->store == $product->store)
            {
                $alreadyExist = true;
                $order->quantity += request()->quantity;
            }
        }
        if ($alreadyExist == false)
        {
            $product->quantity = request()->quantity;
            $currentOrders[] = $product;
        }
        session(['currentOrders' => $currentOrders]);

        return back()->with('messages', [__('messages.tocartdone')]);
    }
}
