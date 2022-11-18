
@extends('layouts.app')

@section('styles')
    <style>
        .btn{
            border-radius: 0px;
        }
    </style>
@endsection

@section('customNav')
    @component('layouts.customnav') @endcomponent
@endsection 

@section('content')
        <div class="row mt-4">
            <p><a class='text-light' href="/order/storesOrders">{{__('messages.backtostoreorders')}}</a></p>
        </div>

        <div class="row mt-2">
       <div class="col-4">
            <div class="border-top mb-2"></div>
            <h5><b class="text-muted">{{__('messages.orderdetails')}}</b></h5> 
            <div class="border-top mb-2"></div>
            <h6><div class="text-secondary">{{__('messages.nameholder')}}</div>{{$order->user->name}}</h6> 
            <h6><div class="text-secondary">{{__('messages.phoneholder')}}</div> {{$order->user->phone}}</h6> 
            <h6><div class="text-secondary">{{__('messages.emailholder')}}</div> {{$order->user->email}}</h6> 
            <h6 dir='auto'><div class="text-secondary">{{__('messages.addressholder')}}</div> {{__('messages.areaholder')}}: {{$order->user->address['area']}}, {{__('messages.blockholder')}}: {{$order->user->address['block']}}<br>
            {{__('messages.streetholder')}}: {{$order->user->address['street']}}, {{__('messages.householder')}}: {{$order->user->address['house']}}<br>
            {{__('messages.additionalholder')}}: {{$order->user->address['additional']}}</h6>
            <div class="border-top mt-2 mb-2"></div>
            <h6><div class="text-secondary">{{__('messages.storenameholder')}}</div> {{$order->store->name}} 
            <div class="border-top mt-2 mb-2"></div>
            <h6><div class="text-secondary">{{__('messages.orderdate')}} </div>{{$order->created_at}}</h6> 
            <h6><div class="text-secondary">{{__('messages.status')}} </div> <span class="text-uppercase">{{$order->status}} </span>
            @if($order->status == 'shipped' || $order->status == 'delivered')
                  {{$order->updated_at}} 
            @endif</h6> 
       </div>
       <div class="col-8">
       <table class="table text-light">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.ideanameholder')}}</th>
            <th scope="col">{{__('messages.quantity')}}</th> 
            <th scope="col">{{__('messages.ideaprice')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $product)
            <tr>
            <th scope="row">{{$product['id']}}</th>
            <td>{{$product['name']}}</td>
            <td>{{$product['quantity']}}</td>
            <td>{{$product['price'] * $product['quantity'] }} {{__('messages.AED')}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <tr>
            <td>
                <h6 class="text-right"><b>{{__('messages.total')}}</b> {{$total}} {{__('messages.AED')}}</h6>
            <td>
        </tr>
       </div>
       </div>
@endsection