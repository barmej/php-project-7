@extends('layouts.app')

@section('styles')
    <style>
        .btn{
            border-radius: 0px;
        }
        .mid{
        color:#fff; 
        font-family: 'Nunito', sans-serif; 
        border-radius: 15px;     
        box-shadow: 0 2px 8px 0 rgba(221, 221, 221, 0.226), 0 6px 20px 0  rgba(221, 221, 221, 0.226);
        margin-top:95px;
        margin-bottom:90px;
        }
    </style>
@endsection

@section('customNav')
    @component('layouts.customnav') @endcomponent
@endsection

@section('content')
    <div class="col-12 mt-4 mx-auto">
    @if(!empty($allOrders))
    <h5 class="text-light">{{__('messages.mystoresorders')}}</h5>
    @for( $i=0 ; $i < sizeof($allOrders); $i++)
    <h5 class="text-secondary">{{__('messages.storenum')}} {{$allOrders[$i][0]->store_id}}</h5>
    <table class="table text-light">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.invoicenum')}}</th>
            <th scope="col">{{__('messages.paymentmethod')}}</th>
            <th scope="col">{{__('messages.status')}}</th> 
            <th scope="col">{{__('messages.products')}}</th>
            <th scope="col">{{__('messages.details')}}</th>
            <th scope="col">{{__('messages.shipping')}}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($allOrders[$i] as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->transaction_id}}</td>
                <td>
                @if($order->payment_type == 'CASH'){{__('messages.cash')}} @endif
                @if($order->payment_type == 'VISA'){{__('messages.visa')}}@endif
                </td>
                <td>
                @if($order->status == 'delivered'){{__('messages.delivered')}} @endif
                @if($order->status == 'shipped'){{__('messages.shipped')}} @endif
                @if($order->status == 'paid'){{__('messages.credit')}} @endif
                @if($order->status == 'pending'){{__('messages.ondelivery')}} @endif
                </td>
                <td>{{sizeof($order->products)}}</td>
                <td><a href="/order/{{$order->id}}" class="btn btn-dark btn-sm">{{__('messages.details')}} <i class="fa fa-search"></i></a>
                @if($order->status == 'paid' || $order->status =='pending')
                <td><a href="/order/{{$order->id}}/shipped" class="btn btn-dark btn-sm">{{__('messages.shiporder')}} <i class="fa fa-truck"></i></a>
                @elseif($order->status == 'shipped')
                <td style="font-size:12px;"> 
                {{__('messages.ordermsg')}} <i class="far fa-clock"></i>
                </td>
                @else<td style="font-size:12px;"> {{__('messages.done')}} <i class="fas fa-check-circle"></i> </td> @endif
            </tr>
        @endforeach          
        </tbody>
        </table>    
    @endfor
    </div>
    @else
        <div class="col-6 mid mx-auto pt-3">
            <h6 class="text-center">{{__('messages.noordersyet')}}</h6>
            <div class="text-center">
            <a href="/" class="btn btn-dark btn-sm mb-3">{{__('messages.home')}}</a>
            </div>
        </div>
    @endif
@endsection