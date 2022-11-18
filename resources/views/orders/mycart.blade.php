@extends('layouts.app')

@section('styles')
    <style>
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .warningSize {
            font-size: 12px;
        }
        
        .btn{
            border-radius: 0px;
        }
    </style>
@endsection 

@section('customNav')
    @component('layouts.customnav')@endcomponent
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-1">
    </div>
    <div class="col-10">
    <table class="table text-light">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('messages.ideanameholder')}}</th>
        <th scope="col">{{__('messages.storenameholder')}}</th>
        <th scope="col">{{__('messages.quantity')}}</th> 
        <th scope="col">{{__('messages.ideaprice')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach(session('currentOrders') as $product)
        <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->store->name}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->price * $product->quantity}} {{__('messages.AED')}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <tr>
        <td>
            <h6 class="text-right"><b>{{__('messages.total')}}</b>{{$total}} {{__('messages.AED')}}</h6>
            <p class="text-right"></p>
            <div class="text-right">
            <h6 class="text-right"><b>{{__('messages.paymentmethods')}}<br></h6>
            @if(!empty(auth()->user()->address))
            <a href="/order/chargeRequest"><img src="{{asset('/images/card1.png')}}" height=27px></a>
            <a href="/order/chargeRequest"><img src="{{asset('/images/card2.png')}}" height=27px></a>
            <a href="/order/cash"><img src="{{asset('/images/cash.png')}}" height=27px></a>
            @endif
            </div>
            @if(empty(auth()->user()->address))
            <p class="text-muted text-right warningSize">{{__('messages.addressmsg2')}} <a class="text-light" href="/users/myaccount/address">{{__('messages.myaddress')}}</a>{{__('messages.addressmsg3')}} <p>
            @else
            <div dir='auto' class="text-left warningSize">
            <span class="text-muted"><b>{{__('messages.addressmsg1')}}</b></span><br>
            <span class="text-light">{{__('messages.area')}}: {{auth()->user()->address['area']}}, {{__('messages.block')}}:  {{auth()->user()->address['block']}}, {{__('messages.street')}}: {{auth()->user()->address['street']}}<br> </span>
            <span class="text-light">{{__('messages.house')}}: {{auth()->user()->address['house']}}, {{__('messages.additionalholder')}}: {{auth()->user()->address['additional']}}<br><br></span>
            <span class="text-muted"><b>{{__('messages.addressmsg4')}}</b> <a class="text-light" href="/users/myaccount/address">{{__('messages.myaddress')}}</a></span>
            @endif
            </div>
            <div class="text-right ml-4">
            <a href="/" class="btn btn-dark btn-sm">{{__('messages.contshopping')}} <i class="fas fa-shopping-basket"></i></a>
            </div>
        <td>
    </tr>
    </div>

    <div class="col-1">
    </div>
</div>
@endsection