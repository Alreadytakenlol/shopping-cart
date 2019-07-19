@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
       <h1>{{Auth::user()->name}} Profile</h1>
       <hr>
       <h2>My Orders</h2>
       <div class="panel panel-default">
           @foreach($orders as $order)
           <div class="panel-body">
               <ul class="list-group-item">
                   @foreach($order['cart']['items'] as $item)
                        <li class="list-group-item">
                            <span class="badge">$ {{$item['price']}} </span>
                            <span> {{$item['item']['title']}}</span> 
                            <span class="pull-right">Amount {{$item['qty']}}</span> 
                        </li>
                   @endforeach
               </ul>
           </div>
           <div class="panel-footer">
                <strong>Total Price:${{$order['cart']['totalPrice']}} </strong>
           </div>
           @endforeach
       </div>
    </div>
</div>
@endsection