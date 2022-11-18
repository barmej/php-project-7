@extends('layouts.app')

@section('styles')
    <style>
        .card img {
            height: 100px;
            object-fit: cover;
        }

        .card {
            background-color: rgb(23, 23, 26);
            border-color: rgb(23, 23, 26);
            color: #fff;
            font-family: 'Nunito', 'Droid Arabic Kufi', sans-serif;
            min-width: 180px;
            max-width: 180px;
            margin: 8px !important;
        }

        .btn {
            border-radius: 0px;
        }
    </style>
@endsection

@section('customNav')
    @component('layouts.customnav') @endcomponent
@endsection

@section('content')
    <div class="container my-auto">
        <div class="card-group">
            @foreach($stores as $store)
                <div class="card" style="width: 16rem;">
                    @isset($store->image)
                        <img src="{{asset($store->image)}}" class="card-img-top">
                    @endisset
                    @empty($store->image)
                        <img src="{{asset('/images/storeplaceholder.jpg')}}" class="card-img-top">
                    @endempty
                    <div class="text-center py-2">
                        {{$store->name}}
                    </div>
                    <a href="/stores/{{$store->id}}/ideas"
                       class="btn btn-dark btn-block btn-sm">{{__('messages.visit')}}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
