
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
        <p><a class="text-light" href="/order/myOrders">{{__('messages.backorders')}}</a></p>
        </div>

        <div class="row mt-2">
       <div class="col-3">
       <div class="border-top mb-2"></div>
            <h5><b class="text-muted">{{__('messages.orderdetails')}}</b></h5> 
            <div class="border-top mb-2"></div>
            <h6 ><div class="text-secondary">{{__('messages.phone')}}</div> {{auth()->user()->phone}}</h6> 
            <h6><div class="text-secondary">{{__('messages.email')}}</div> {{auth()->user()->email}}</h6> 
            <h6 dir='auto'><div class="text-secondary">{{__('messages.addressholder')}}</div> {{__('messages.areaholder')}}: {{auth()->user()->address['area']}}, {{__('messages.blockholder')}}: {{auth()->user()->address['block']}}
            {{__('messages.streetholder')}}: {{auth()->user()->address['street']}}, {{__('messages.householder')}}: {{auth()->user()->address['house']}}
            {{__('messages.additionalholder')}}: {{auth()->user()->address['additional']}}</h6>            
       </div>

       <div class="col-9">
       <table class="table text-light">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('messages.ideanameholder')}}</th>
        <th scope="col">{{__('messages.storenameholder')}}</th>
        <th scope="col">{{__('messages.quantity')}}</th> 
        <th scope="col">{{__('messages.ideapriceholder')}}</th>
        <th scope="col">{{__('messages.status')}}</th>
        <th scope="col">{{__('messages.received')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $i => $product)
            <tr>
            <th scope="row">{{$IDs[$i]}}</th>
            <td>{{$product['name']}}</td>
            <td>{{$product['store']['name']}}</td>
            <td>{{$product['quantity']}}</td>
            <td>{{$product['price'] * $product['quantity'] }} {{__('messages.AED')}}</td>
            <td>
            @if($status[$i] == 'delivered'){{__('messages.delivered')}} @endif
            @if($status[$i] == 'shipped'){{__('messages.shipped')}} @endif
            @if($status[$i] == 'paid'){{__('messages.credit')}} @endif
            @if($status[$i] == 'pending'){{__('messages.ondelivery')}} @endif
            </td>
            <td>
                @if($status[$i] == 'shipped')
                <a href="/order/{{$IDs[$i]}}/delivered" class="btn btn-dark btn-sm">{{__('messages.yes')}} <i class="fas fa-thumbs-up"></i></i></a>
                @elseif($status[$i] == 'delivered')
                {{__('messages.yes')}} <i class="fas fa-check-circle"></i>
                @else 
                <a href="/" class="btn btn-dark btn-sm disabled">{{__('messages.yes')}} <i class="fas fa-thumbs-up"></i></a>
                @endif
            </td>
            </tr>
        @endforeach
    </tbody>
    </table>
        <tr>
            <td>
            <h6 class="text-right"><b>{{__('messages.total')}} </b> {{$total}} {{__('messages.AED')}}</h6>
            <td>
        </tr>
       </div>
       </div>
@endsection