@extends('layouts.app')

@section('styles')
    <style>
        .middle{
            color:#fff; 
            font-family: 'Nunito','Droid Arabic Kufi', sans-serif; 
            box-shadow: 0 2px 8px 0 rgba(221, 221, 221, 0.226), 0 6px 20px 0  rgba(221, 221, 221, 0.226);
            font-size:14px;
            border-radius: 15px;
            padding:13px;
            margin-top:10px;
        }
    </style>
@endsection

@section('customNav')
    @component('layouts.customnav') @endcomponent
@endsection 

@section('content')
<div class="row">
    <div class="col-4">
    </div>
    <div class="col-3 middle mx-auto pt-3">
    <form method="post" action="/users/store"> 
    @csrf
    <div class="form-group">
    <label for="name">{{__('messages.name')}}</label>
    <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="{{__('messages.nameholder')}}">
    </div>
    <div class="form-group">
        <label for="email">{{__('messages.email')}}</label>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{__('messages.emailholder')}}">
    </div>
    <div class="form-group">
        <label for="phone">{{__('messages.phone')}}</label>
        <input name="phone" type="text" id="phone" class="form-control" aria-describedby="phoneHelp" placeholder="+971 5x xxx xxxx">
    </div>
    <div class="form-group">
        <label for="password">{{__('messages.password')}}</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="{{__('messages.passwordholder')}}">
    </div>
    <div class="form-group">
        <label for="confirm">{{__('messages.confirmpassword')}}</label>
        <input name="confirm" type="password" class="form-control" id="confirm" placeholder="{{__('messages.confirmpasswordholder')}}">
    </div>
    <button type="register" class="btn btn-dark btn-sm btn-block">{{__('messages.register')}}</button>
    </form>   
    </div>
    <div class="col-4">
    </div>
</div>
@endsection