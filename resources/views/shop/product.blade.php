@extends('layouts.master')

@section('title')
    Laravel Shop Cart
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h1>{{$product->title}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-md-8">
        @php
            if(strpos($product->imagePath, 'http') === false){
                $imagePath = voyager::image($product->imagePath);
            }else{
                $imagePath = $product->imagePath;
            }
        @endphp
            <img src="{{$imagePath}}" class="img-fluid rounded" alt="...">
            <br/><br/>
            <h5>{!!$product->description!!}</h5>
        </div>
        <div class="col-sm-2 col-md-2">
            <a href="{{route('product.index')}}" class="btn btn-danger pull-right" role="button"><- Back</a>
            
        </div>
        
    </div>
    <div class="row">
        <div class="col-sm-8 col-md-8">
            <a href="{{route('product.addToCart',['id'=>$product->id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
        </div>
    </div>
    <br/>
            <p>Picture Source: </p><a href="{{$imagePath}}"><p>{{$imagePath}}</p></a>
       
    
@endsection

@section('scripts')
    <script>url="{{URL::to('')}}";</script>
    <script type="text/javascript" src="{{URL::to('js/choosemethod.js')}}"></script>
@endsection