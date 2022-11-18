@extends('layouts.app')

@section('styles')
    <style>
        .mid{
            color:#fff; 
            font-family: 'Droid Arabic Kufi','Nunito', sans-serif; 
            border-radius: 15px;     
            box-shadow: 0 2px 8px 0 rgba(221, 221, 221, 0.226), 0 6px 20px 0  rgba(221, 221, 221, 0.226);
            margin-top:112px;
            margin-bottom:112px;
        }
    </style>
@endsection

@section('customNav')
    @component('layouts.customnav', ['storeControl'=>'storeControl', 'store'=> $store]) @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-2">
    </div>

    <div class="col-7 text-center mid mx-auto pt-3">
        <h6 class="text-light text-uppercase">{{__('messages.storedeletemsg')}} </h5>
        <a class="btn btn-dark w-25 mb-3 btn-sm" href="/stores/{{$id}}/delete">{{__('messages.yes')}}</a>
        <a href="/users/mystores" class="btn btn-dark w-25 mb-3 btn-sm">{{__('messages.no')}}</a>
    </div>

    <div class="col-2">
    </div>
</div>
@endsection