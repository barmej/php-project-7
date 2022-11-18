@extends('layouts.app')

@section('styles')
    <style>
        .mid{
            color:#fff; 
            font-family: 'Nunito','Droid Arabic Kufi', sans-serif; 
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
<div class="row mt-5">
    <div class="col-4">
    <h5 style="color:rgb(121, 121, 121);"> {{__('messages.myaccount')}} </h5>
    <ul class="list-group list-group-flush"style="font-size:14px;">
    <li class="list-group-item" style="background-color:rgb(23, 23, 26);">
        <a href="/users/myaccount/{{'info'}}" class="text-light">{{__('messages.info')}}</a>
    </li>
    <li class="list-group-item " style="background-color:rgb(23, 23, 26);">
         <a href="/users/myaccount/{{'user'}}" class="text-light">{{__('messages.change1')}}</a>
    </li>
    <li class="list-group-item" style="background-color:rgb(23, 23, 26);">
        <a href="/users/myaccount/{{'address'}}" class="text-light">{{__('messages.change2')}}</a>
    </li>
    <li class="list-group-item" style="background-color:rgb(23, 23, 26);">
        <a href="/users/myaccount/{{'password'}}" class="text-light">{{__('messages.change3')}}</a>
    </li>
    </ul>
    </div>
   
    <div class="col-6 mid mx-auto pt-3 ">
            @if($what == 'info')
            <div style="color:rgb(121, 121, 121);">
            {{__('messages.name')}} <p class="text-light">{{auth()->user()->name}}</p>
            {{__('messages.email')}} <p class="text-light"> {{auth()->user()->email}}</p>
            {{__('messages.phone')}} <p class="text-light">{{auth()->user()->phone}}</p>
            @if(!empty(auth()->user()->address))
                {{__('messages.address')}}: <br>
                <span dir='auto' class="text-light">{{__('messages.areaholder')}}: {{auth()->user()->address['area']}}, {{__('messages.blockholder')}}: {{auth()->user()->address['block']}}
                {{__('messages.streetholder')}}: {{auth()->user()->address['street']}}, {{__('messages.householder')}}: {{auth()->user()->address['house']}}
                {{__('messages.additionalholder')}}: {{auth()->user()->address['additional']}} </span'>
            @endif
            </div><br>
            @endif

            @if($what == 'user')
            <h5 class="text-center">{{__('messages.contact')}}</h5>
            <form method="post" action="/users/edit"> 
            @csrf
            <div class="form-row">
            <div class="col">
                <label for="email">{{__('messages.email')}}</label>
                <input value='{{$user->email}}' name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{__('messages.emailholder')}}">
            </div>
            <div class="col">
                <label for="phone">{{__('messages.phone')}}</label>
                <input value='{{$user->phone}}' name="phone" type="text" id="phone" class="form-control" placeholder="{{__('messages.phoneholder')}}"/>
            </div>
            </div>
            <br>
            <div class="form-row">
            <div class="col">
                <label for="password">{{__('messages.password')}}</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="{{__('messages.passwordholder')}}">
            </div>
            <div class="col">
                <label for="confirm">{{__('messages.confirmpassword')}}</label>
                <input name="confirm" type="password" class="form-control" id="confirm" placeholder="{{__('messages.confirmpasswordholder')}}">
            </div>
            </div>
            <br>
            <button type="register" class="btn btn-dark btn-sm btn-block mb-3">{{__('messages.updatecontact')}}</button>
            </form>
        @endif

        @if($what == 'address')
        <h5 class="text-center">{{__('messages.myaddress')}}</h5>
        <form method="post" action="/users/myaddress"> 
        @csrf
        <div class="form-row">
            <div class="col">
            <label for="area">{{__('messages.area')}}</label>
            @if(empty(auth()->user()->address))
            <input name="area" type="text" class="form-control" id="area" aria-describedby="areaHelp" placeholder="{{__('messages.areaholder')}}">
            @else
            <input name="area" type="text" class="form-control" id="area" aria-describedby="areaHelp" placeholder="{{__('messages.areaholder')}}" value="{{$address['area']}}">
            @endif
        </div>
        <div class="col">
            <label for="block">{{__('messages.block')}}</label>
            @if(empty(auth()->user()->address))
            <input name="block" type="text" class="form-control" id="block" aria-describedby="blockHelp" placeholder="{{__('messages.blockholder')}}">
            @else
            <input name="block" type="text" class="form-control" id="block" aria-describedby="blockHelp"placeholder="{{__('messages.blockholder')}}" value="{{$address['block']}}">
            @endif
        </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
            <label for="street">{{__('messages.street')}}</label>
            @if(empty(auth()->user()->address))
            <input name="street" type="text" class="form-control" id="street" aria-describedby="streetHelp" placeholder="{{__('messages.streetholder')}}">
            @else
            <input name="street" type="text" class="form-control" id="street" aria-describedby="streetHelp" placeholder="{{__('messages.streetholder')}}" value="{{$address['street']}}">
            @endif
        </div>
        <div class="col">
            <label for="house">{{__('messages.house')}}</label>
            @if(empty(auth()->user()->address))
            <input name="house" type="text" class="form-control" id="house" aria-describedby="houseHelp" placeholder="{{__('messages.householder')}}">
            @else
            <input name="house" type="text" class="form-control" id="house" aria-describedby="houseHelp" placeholder="{{__('messages.householder')}}" value="{{$address['house']}}">
            @endif
        </div>
        </div>
        <br>
        <div class="form-group">
            <label for="additional">{{__('messages.additional')}}</label>
            @if(empty(auth()->user()->address))
            <input name="additional" type="text" class="form-control" id="additional" aria-describedby="additionalHelp" placeholder="{{__('messages.additionalholder')}}">
            @else
            <input name="additional" type="text" class="form-control" id="additional" aria-describedby="additionalHelp" placeholder="{{__('messages.additionalholder')}}" value="{{$address['additional']}}">
            @endif
        </div>

            <div class="form-row mb-3">
            <div class="col">
                <label for="password"> {{__('messages.password')}}</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="{{__('messages.passholder')}}">
            </div>
            <div class="col">
                <label for="confirm">{{__('messages.confirmpassword')}}</label>
                <input name="confirm" type="password" class="form-control" id="confirm" placeholder="{{__('messages.confirmholder')}}">
            </div>
            </div>
        <button type="register" class="btn btn-dark btn-sm btn-block mb-3">{{__('messages.updateaddress')}}</button>
        </form>
        @endif 


        @if($what == 'password')
        <h5 class="text-center">{{__('messages.mypassword')}}</h5>
            <form method="post" action="/users/restpassword"> 
            @csrf
            <div class="form-row">
            <div class="col">
                <label for="password"> {{__('messages.password')}}</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="{{__('messages.passholder')}}">
            </div>
            <div class="col">
                <label for="confirm">{{__('messages.confirmpassword')}}</label>
                <input name="confirm" type="password" class="form-control" id="confirm" placeholder="{{__('messages.confirmholder')}}">
            </div>
            </div>
            <br>

            <div class="form-row">
            <div class="col">
                <label for="newpassword">{{__('messages.newpassword')}}</label>
                <input name="newpassword" type="password" class="form-control" id="newpassword" placeholder="{{__('messages.newholder')}}">
            </div>
            <div class="col">
                <label for="confirmnew">{{__('messages.confirmnew')}}</label>
                <input name="confirmnew" type="password" class="form-control" id="confirmnew" placeholder="{{__('messages.confirmnewholder')}}">
            </div>
            </div>
            <br>
            <button type="register" class="btn btn-dark btn-sm btn-block mb-3">{{__('messages.change3')}}</button>
            </form>
        @endif
    </div>

    <div class="col-2">
    </div>
</div>
@endsection