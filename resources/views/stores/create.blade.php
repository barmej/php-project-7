@extends('layouts.app')

@section('styles')
    <style>
        .mid{
            color:#fff; 
            font-family: 'Nunito', 'Droid Arabic Kufi',sans-serif; 
            border-radius: 15px;     
            box-shadow: 0 2px 8px 0 rgba(221, 221, 221, 0.226), 0 6px 20px 0  rgba(221, 221, 221, 0.226);
            margin-top:auto;
            margin-bottom:auto;
        }
        .mirg{
            margin-top: 468px;
        }
    </style>
@endsection

@section('customNav')
    @component('layouts.customnav') @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-3 mirg mr-0">
    </div>
    <div class="col-4 mid mx-auto pt-3">
        <h5 class="text-center">{{__('messages.newstore')}} </h5>
        <form method="post" action="/stores/store" enctype="multipart/form-data"> 
            @csrf
        <div class="form-group">
            <label for="name">{{__('messages.storename')}}</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="{{__('messages.storenameholder')}}" required>
        </div>
        <div class="form-group">
            <label for="description">{{__('messages.storedescrip')}}</label>
            <input name="description" type="text" class="form-control" id="description" aria-describedby="descriptionHelp" placeholder="{{__('messages.storedescripholder')}}">
        </div>
        <div class="form-group">
            <label for="logo">{{__('messages.storeimage')}}</label>
            <input type="file" name="logo" class="form-control-file" id="logo">
        </div>
        <button type="register" class="btn btn-dark btn-sm btn-block mb-3">{{__('messages.buildstore')}}</button>
        </form>
    </div>

    <div class="col-3">
    </div>
</div>
@endsection