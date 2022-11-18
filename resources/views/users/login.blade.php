@extends('layouts.app')

@section('styles')
    <style>
        .mid{
            color:#fff; 
            font-family: 'Nunito','Droid Arabic Kufi', sans-serif; 
            border-radius: 15px;     
            box-shadow: 0 2px 8px 0 rgba(221, 221, 221, 0.226), 0 6px 20px 0  rgba(221, 221, 221, 0.226);
            height: 230px;
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
    <div class="col-4 mirg mr-0">

    </div>
    <div class="col-3 mid mx-auto pt-3">
    <form method="post" action="/users/login"> 
    @csrf
    <div class="form-group">
        <label for="email">{{__('messages.email')}}</label>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{__('messages.emailholder')}}" required>
    </div>
    <div class="form-group">
        <label for="password">{{__('messages.password')}}</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="{{__('messages.passwordholder')}}" required>
    </div>
    <button type="register" class="btn btn-dark btn-sm btn-block">{{__('messages.login')}}</button>
    </form>
    </div>
    <div class="col-4">
    </div>
</div>
@endsection