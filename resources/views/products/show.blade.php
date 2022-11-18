@extends('layouts.app')

@section('styles')
    <style>
        .btn{
            border-radius:0px;
        }

        .productImage{
            width:100%;
            margin-left: 20px;
        }

    </style>
@endsection

@section('customNav')
    @component('layouts.customnav', ['productControl'=>'productControl', 'storeControl'=>'storeControl', 'store' => $product->store, 'product'=> $product]) @endcomponent
@endsection

@section('content')
<div class="mt-3"><a class="p-2 text-light" href="/stores/{{$product->store->id}}/ideas">{{__('messages.backtostore')}}</a></div>
<div class="row mt-3">
    <div class="col-4">
        @if(sizeof($product->images) > 1)
        <div class="productImage">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" style="width=380px;">
            @foreach($product->images as $image)
            <div class="carousel-item {{$loop->first ? 'active': ' '}}">
                <a target="_blank" href="{{$image}}"><img src="{{$image}}" class="d-block w-100"></a>
            </div>
            @endforeach
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
        <br>
        <span class="text-secondary">{{__('messages.fullimagemsg')}}</span>
        </div>
        @else 
            @if(sizeof($product->images)==1) 
            <a target="_blank" href="{{$product->images[0]}}"><img src="{{$product->images[0]}}" width=380px></a>
            <span class="text-secondary">{{__('messages.fullimagemsg')}}</span>
            @endif
            @if(sizeof($product->images)== 0)
            <img src="{{asset('/images/productplaceholder.jpg')}}" width=380px> 
            <div class="text-secondary mx-auto mt-1">{{__('messages.noimagemsg')}}</div>
            @endif
        @endif        
    </div>

    <div class="col-3 mx-auto">
        <b class="text-secondary">{{__('messages.ideaname')}} </b>
        <p>{{$product->name}}</p>
        <b class="text-secondary">{{__('messages.priceperunit')}} </b>
        <p>{{$product->price}} AED</p>
        @auth
        @if(auth()->user()->id != $product->store->user_id)
        <form action="/order/addIdea/{{$product->id}}" method="post">
            @csrf
            <div class="form-group">
                <label class="text-secondary" for="exampleFormControlSelect1">{{__('messages.quantity')}}</label>
                <select name="quantity" class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-dark btn-sm w-50">{{__('messages.addtocart')}}</button>
        </form>
        @endif
        @endauth
    </div>

    <div class="col-4">
    </div>

</div>
@endsection