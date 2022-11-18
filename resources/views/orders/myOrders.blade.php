@extends('layouts.app')

@section('styles')
    <style>
        .btn{
            border-radius: 0px;
        }
    </style>
@endsection
@section('customNav')
    @component('layouts.customnav') @endcomponent
@endsection

@section('content')
<div class="row mt-4">

    <div class="col-11 mx-auto">
    <h5 class="text-light">{{__('messages.orderhistory')}}</h5>
    <table class="table  text-light">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.invoicenum')}}</th>
            <th scope="col">{{__('messages.paymentmethod')}}</th>
            <th scope="col">{{__('messages.status')}}</th> 
            <th scope="col">{{__('messages.products')}}</th>
            <th scope="col">{{__('messages.details')}}</th>
            <th scope="col">{{__('messages.received')}}</th>
            </tr>
        </thead>
        <tbody>
                @for($i=0; $i < sizeof($filteredOrders) ; $i++)
                <tr>
                <th scope="row">{{$filteredOrders[$i]->id}}</th>
                <td>{{$filteredOrders[$i]->transaction_id}}</td>
                <td>
                @if($filteredOrders[$i]->payment_type == 'CASH'){{__('messages.cash')}} @endif
                @if($filteredOrders[$i]->payment_type == 'VISA'){{__('messages.visa')}}@endif
                </td>
                <td>
                    @if($delivered[$i] == '1') 
                    {{__('messages.delivered')}} 
                    @elseif ($delivered[$i] == '2') 
                    {{__('messages.shipped')}}
                    @else
                        @if($filteredOrders[$i]->payment_type == 'CASH'){{__('messages.ondelivery')}}@endif
                        @if($filteredOrders[$i]->payment_type == 'VISA') {{__('messages.credit')}}@endif
                    @endif
                </td>
                <td>
                {{$products[$i]}}  
                </td>
                <td><a href="/order/{{$filteredOrders[$i]->transaction_id}}/details" class="btn text-center btn-dark btn-sm">{{__('messages.details')}} <i class="fa fa-search"></i></a>
                </td>
                <td>
                    @if($delivered[$i] == '1') 
                   {{__('messages.yes')}} <i class="fas fa-check-circle"></i>
                    @elseif ($delivered[$i] == '2') 
                    <a href="/order/{{$IDs[$i]}}/delivered" class="btn btn-dark btn-sm">{{__('messages.yes')}} <i class="fas fa-thumbs-up"></i></a>
                    @else
                    <div style="font-size:12px;"> 
                    {{__('messages.waitingship')}} <i class="far fa-clock"></i>
                    </div>
                    @endif
                </td>
            </tr>
        @endfor         
        </tbody>
        </table>    
    </div>

</div>
@endsection