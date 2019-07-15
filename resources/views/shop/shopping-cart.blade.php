@extends('layouts.master')

@section('title')
Laravel Shop Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-ms-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <strong>{{$product['item']['title']}}</strong>
                            <span class="label label-success">{{$product['item']['price']}}</span>
                            <div class="btn-group pull-right">
                                <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('product.reduceByOne',['id'=>$product['item']['id']]) }}">Reduce by 1</a></li>
                                    <li><a href="{{route('product.remove',['id'=>$product['item']['id']]) }}">Reduce All</a></li>
                                </ul>
                                <span class="badge pull-right">{{$product['qty']}}</span>
                            </div>
                            
                        </li>
                    @endforeach    
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-ms-offset-3">
                <strong>Total:{{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-ms-offset-3">
                <a href="{{route('choosemethod')}}" type="button" class="btn btn-success">ChooseMethod</a>
            </div>
        </div>
    @else    
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-ms-offset-3">
                <h2>No Items in Cart</h2>
            </div>
        </div>
    @endif
@endsection