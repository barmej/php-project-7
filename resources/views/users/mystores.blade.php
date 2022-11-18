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
            font-family: 'Nunito','Droid Arabic Kufi' sans-serif;
            min-width:180px;
            max-width:180px;
            margin: 8px !important;
        }

        .btn{
            border-radius:0px;
        }

        .mid{
        color:#fff; 
        font-family: 'Nunito','Droid Arabic Kufi' sans-serif; 
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
    <div class="container my-auto">
    <div class="card-group">
    @foreach(auth()->user()->stores as $store)
    <div class="card" style="width: 16rem;">
    @isset($store->image)
        <img src="{{asset($store->image)}}" class="card-img-top" >
    @endisset
    @empty($store->image)
        <img src="{{asset('/images/storeplaceholder.jpg')}}" class="card-img-top">
    @endempty
    <div class="text-center py-2">
        {{$store->name}}
    </div>
    <a href="/stores/{{$store->id}}/ideas" class="btn btn-dark btn-block btn-sm">{{__('messages.visit')}}</a>
    <a href="/stores/{{$store->id}}/edit" class="btn btn-dark btn-block btn-sm">{{__('messages.editstore1')}}</a>
    <a href="/stores/{{$store->id}}/confirmation" class="btn btn-dark btn-block btn-sm">{{__('messages.deletestore')}}</a>
    </div>
    @endforeach
    </div>
    @empty(auth()->user()->stores[0])
        <div class="col-6 mid mx-auto pt-3">
            <h6 class="text-center">{{__('messages.nostores')}}</h6>
            <div class="text-center">
            <a href="/stores/create" class="btn btn-dark btn-sm mb-3">{{__('messages.buildstorenew')}}</a>
            </div>
        </div>
    @endempty
</div>
@endsection