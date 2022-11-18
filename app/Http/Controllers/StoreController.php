<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('stores.create');
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
        //
        $validateDate = $request->validate([
            'name'        => 'required|max:25',
            'description' => 'required|min:5',
            'logo'        => 'mimes:jpeg,bmp,png,jpg|max:3000',
        ]);

        $path = null;
        if ($request->hasFile('logo'))
            $path = '/storage/' . $request->file('logo')->store('logos', ['disk' => 'public']);

        $newStore = new Store();
        $newStore->name = $request->name;
        $newStore->description = $request->description;
        $newStore->image = $path;
        auth()->user()->stores()->save($newStore);

        return redirect('/users/mystores');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Store $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Store $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
        if ($store->user_id != auth()->user()->id)
            return view('customError');

        return view('stores.edit', compact('store'));
    }

    public function confirmation(Store $store)
    {
        if ($store->user_id != auth()->user()->id)
            return view('customError');
        $id = $store->id;

        return view('stores.delete', compact('id', 'store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Store $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        if ($store->user_id != auth()->user()->id)
            return view('customError');

        $validateDate = $request->validate([
            'name'        => 'required|max:25',
            'description' => 'required|min:5',
            'logo'        => 'mimes:jpeg,bmp,png,jpg|max:3000',
        ]);

        $path = $store->image;
        if ($request->hasFile('logo'))
            $path = '/storage/' . $request->file('logo')->store('logos', ['disk' => 'public']);

        $store->name = $request->name;
        $store->description = $request->description;
        $store->image = $path;
        $store->save();

        return redirect('/users/mystores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Store $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
        if ($store->user_id != auth()->user()->id)
            return view('customError');
        $store->delete();

        return redirect('/users/mystores');
    }

    public function ideas(Request $request, Store $store)
    {
        $user = auth()->user();
        $data = json_decode($store->product, true);
        if ($user)
        {
            if ($user->id == $store->user_id)
            {
                if (empty($data))
                    return view('message', ['message' => __('messages.noideasyet'), 'store' => $store, 'buttonAdd' => true]);

                return view('stores.products', compact('store'));
            } else
            {
                if (empty($data))
                    return view('message', ['message' => __('messages.emptystore'), 'store' => $store, 'buttonHome' => true]);

                return view('stores.products', compact('store'));
            }
        } else
        {
            if (empty($data))
                return view('message', ['message' => __('messages.emptystore'), 'store' => $store, 'buttonHome' => true]);

            return view('stores.products', compact('store'));
        }
    }
}
