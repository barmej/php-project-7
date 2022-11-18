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

        .btn{
            border-radius: 0px;     
        }
    </style>
@endsection

@section('customNav')
    @component('layouts.customnav', ['storeControl'=>'storeControl', 'store'=> $store]) @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-2 mirg mr-0">
    </div>

    <div class="col-4 mid mx-auto pt-3">
        <h6 class="text-center">{{$message}}</h6>
        <div class="text-center">
        @if(isset($buttonAdd))
        <a href="/ideas/{{$store->id}}/create" class="btn btn-dark btn-sm mb-3">{{__('messages.addfirstidea')}}</a>
        @endif
        @if(isset($buttonHome))
        <a href="/" class="btn btn-dark btn-sm mb-3">{{__('messages.home')}}</a>
        @endif
        </div>
    </div>

    <div class="col-2">
    </div>
</div>
@endsection