@extends('layouts.app')

@section('styles')
    <style>
        .mid{
            color:#fff; 
            font-family: 'Droid Arabic Kufi','Nunito', sans-serif; 
            border-radius: 15px;     
            box-shadow: 0 2px 8px 0 rgba(221, 221, 221, 0.226), 0 6px 20px 0  rgba(221, 221, 221, 0.226);
        }
    </style>
@endsection

@section('customNav')
    @component('layouts.customnav', ['productControl'=>'productControl', 'product'=> $product, 'storeControl'=>'storeControl', 'store'=>$store]) @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-2 mt-2 mr-0">
         <div class="mt-3"><a class="p-2 text-light" href="/stores/{{$store->id}}/ideas">{{__('messages.backtostore')}}</a></div>
    </div>
    <div class="col-5 mid mt-5 mx-auto pt-3">
        <h5 class="text-center">{{__('messages.editideatemp')}}</h5>
        <form method="post" action="/ideas/{{$product->id}}" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
        <div class="form-group">
            <label for="name">{{__('messages.ideaname')}}</label>
            <input value='{{$product->name}}' name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="{{__('messages.ideanameholder')}}" required>
        </div>
        <div class="form-group">
            <label for="price">{{__('messages.ideaprice')}}</label>
            <input value='{{$product->price}}' name="price" type="number" class="form-control" id="price" aria-describedby="priceHelp" placeholder="{{__('messages.ideapriceholder')}}" required>
        </div>
        <div class="form-group">
            <label for="logo">{{__('messages.ideaimages')}}</label>
            <input type="file" name="image1" class="form-control-file" id="image1">
            <br>
            <input type="file" name="image2" class="form-control-file" id="image2">
        </div>
        <button type="register" class="btn btn-dark btn-sm btn-block mb-3">{{__('messages.editidea')}}</button>
        </form>
    </div>
    <div class="col-2">
    </div>
</div>
@endsection