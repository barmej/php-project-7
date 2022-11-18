@extends('layouts.app')

@section('styles')
    <style>
        .card img{
            height:100px;
            object-fit: cover;
        }

        .card{
            background-color:  rgb(23, 23, 26);
            border-color: rgb(23, 23, 26);
            color: #fff;
            font-family: 'Nunito','Droid Arabic Kufi', sans-serif;
            min-width:180px;
            max-width:180px;
            margin: 8px !important;
        }

        .btn{
            border-radius:0px;
        }

        .mid{
            color:#fff; 
            font-family: 'Nunito','Droid Arabic Kufi', sans-serif; 
            border-radius: 15px;     
            box-shadow: 0 2px 8px 0 rgba(221, 221, 221, 0.226), 0 6px 20px 0  rgba(221, 221, 221, 0.226);
            margin-top:auto;
            margin-bottom:auto;
        }
        </style>
@endsection

@section('customNav')
    @component('layouts.customnav', ['storeControl'=>'storeControl', 'store'=> $store]) @endcomponent
@endsection

@section('content')
<div class="mt-3"><a class="p-2 text-light" href="/">{{__('messages.backhome')}}</a></div>
    <div class="container my-3">
    <h5 class="text-light text-uppercase ml-2">{{$store->name}}</h5>
    <b class="text-secondary font-weight-bold">{{__('messages.owner')}}: </b>{{$store->user->name}}</br>
    <b class="text-secondary font-weight-bold">{{__('messages.storedescrip')}}: </b> {{$store->description}}<br>
    <div class="border-bottom my-2"></div>
    <h5 class="text-secondary ml-2">{{__('messages.ideas')}}</h5>
    <div class="card-group">
        @foreach($store->product as $product)
        <div class="card" style="width: 16rem;">
        @isset($product->images[0])
            <img src="{{asset($product->images[0])}}" class="card-img-top" >
        @endisset
        @empty($product->images)
            <img src="{{asset('/images/productplaceholder.jpg')}}" class="card-img-top">
        @endempty
        <div class="text-left pl-1 py-2">
            {{$product->name}} <br>
            {{$product->price}} AED
        </div>
            <a href="/ideas/{{$product->id}}" class="btn btn-dark btn-block btn-sm">{{__('messages.viewidea')}}</a>
        </div>
        @endforeach
    </div>
</div>
@endsection