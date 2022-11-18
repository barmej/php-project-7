@extends('layouts.app')

@section('styles')
    <style>
        .mid{
            color:#fff; 
            font-family: 'Nunito','Droid Arabic Kufi', sans-serif; 
            border-radius: 15px;     
            box-shadow: 0 2px 8px 0 rgba(221, 221, 221, 0.226), 0 6px 20px 0  rgba(221, 221, 221, 0.226);
            margin-top:95px;
            margin-bottom:90px;
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
<div class="row">
    <div class="col-7 text-center mid mx-auto mirg">
        <br>        
        @if($status == 'pending')
        <h6>{{__('messages.orderreceivedmsg')}}<br>
        {{__('messages.keepcashmsg')}} {{__('messages.thanksmsg')}}</h6>
        <a href="/" class="btn btn-dark w-25 mb-3 btn-sm">{{__('messages.home')}}</a>
        {{Session::forget('currentOrders')}}
        @elseif ($status == 'CAPTURED')
        <h6> {{__('messages.orderreceivedmsg')}} {{__('messages.thanksmsg')}} </h6>
        <a href="/" class="btn btn-dark w-25 mb-3 btn-sm">{{__('messages.home')}}</a>
        {{Session::forget('currentOrders')}}
        @else 
        <h6> {{__('messages.sorrymsg')}}</h6>
        <a class="btn btn-dark w-25 mb-3 btn-sm" href="/order/myCart">{{__('messages.backtocart')}}</a>
        <a href="/" class="btn btn-dark w-25 mb-3 btn-sm">{{__('messages.home')}}</a>
        @endif
    </div>
</div>
@endsection