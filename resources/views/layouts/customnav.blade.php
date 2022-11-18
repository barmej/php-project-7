<!---------------------------- GENERAL -------------------------->
<div class="text-center mt-3 mb-2">
    <img src="{{asset('/images/idea2.png')}}" width=140px>
</div>
<div class="mt-4 mb-2">
    @auth
    <b dir='auto' class="text-secondary text-uppercase">{{__('messages.hello')}} {{auth()->user()->name}}</b><br>
    @endauth
    <a class="p-2 text-light" href="/">{{__('messages.home')}} </a> <br>
    <a href="/toArabic" class="pl-2 text-light" href="/">العربية</a> /
    <a href="/toEnglish" class="text-light" href="/">ENGLISH</a> <br>
    @auth
        <a class="p-2 text-light" href="/users/logout">{{__('messages.logout')}} </a> <br>
    @else
        <a class="p-2 text-light" href="/users/register">{{__('messages.register')}}</a> <br>
        <a class="p-2 text-light" href="/users/login">{{__('messages.login')}}</a> <br>
    @endauth
</div>
@auth
<!---------------------------- USER -------------------------->
<div class="border-top">
<div class="mt-3">
<b class="text-secondary">{{__('messages.myaccount')}}</b><br>
  <a class="p-2 text-light" href="/users/myaccount/info">{{__('messages.manageaccount')}}</a> <br>
  <a class="p-2 text-light" href="/users/mystores">{{__('messages.mystores')}}</a> <br>
  <a class="p-2 text-light" href="/stores/create">{{__('messages.newstore')}}</a> <br>
  <!-- ....................... ORDER CONTROL PANEL ................... -->
  @if(sizeof((auth()->user()->orders)) > 0 || session('currentOrders') )
  <div class="border-top  mt-3">
    <div class="mt-3">
        <b class="text-secondary">{{__('messages.myorders')}}</b><br>
            @if(session('currentOrders'))
            <a class="p-2 text-light" href="/order/myCart"><i class="fas fa-shopping-cart"></i> {{__('messages.mycart')}}</a><br>
            @endif
            @if(sizeof((auth()->user()->orders)) > 0)
            <a class="p-2 text-light" href="/order/myOrders">{{__('messages.orderhistory')}}</a> <br>
            @endif
    </div>
  </div>
  @endif
  <!-- ....................... STORES ORDERS DASHBOARD ................... -->
  @if(auth()->user()->stores)
  <div class="border-top mt-3">
    <div class="mt-3">
        <b class="text-secondary">{{__('messages.mystorecontrol')}}</b><br>
            <a class="p-2 text-light" href="/order/storesOrders">{{__('messages.mystoresorders')}}</a><br>
    </div>
  </div>
  @endif
  <!-- ....................... STORE CONTROL PANEL ................... -->
  @if(isset($storeControl) && auth()->user()->id == $store->user_id)
  <div class="border-top mt-3">
    <div class="mt-3">
        <b class="text-secondary">{{__('messages.storecontrol')}}</b><br>
            <a class="p-2 text-light" href="/ideas/{{$store->id}}/create">{{__('messages.addidea')}}</a> <br>
            <a class="p-2 text-light" href="/stores/{{$store->id}}/edit">{{__('messages.editstore')}}</a> <br>
            <a class="p-2 text-light" href="/stores/{{$store->id}}/confirmation" >{{__('messages.deletestore')}}</a><br>
    </div>
  </div>
  @endif
  <!-- ....................... IDEA CONTROL PANEL ................... -->
  @if(isset($productControl) && auth()->user()->id == $product->store->user_id)
  <div class="border-top  mt-3">
    <div class="mt-3">
        <b class="text-secondary">{{__('messages.ideacontrol')}}</b><br>
            <a class="p-2 text-light" href="/ideas/{{$product->id}}/edit">{{__('messages.editidea')}}</a> <br>
            <a class="p-2 text-light" href="/ideas/{{$product->id}}/confirmation">{{__('messages.deleteidea')}}</a> <br>
    </div>
  </div>
  @endif
</div>
</div>
@endauth