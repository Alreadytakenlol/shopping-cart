@extends('layouts.master')

@section('title')
Laravel Shop
@endsection

@section('content')
  @if(Session::has('success_message'))
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
      <div id="charge-message" class="alert alert-success">
          {{Session::get('success_message')}}
      </div>
    </div>
  </div>
  @endif
  @foreach($products as $k=>$v)
    @php
      if(strpos($v->imagePath, 'http') === false){
        $imagePath = voyager::image($v->imagePath);
      }else{
        $imagePath = $v->imagePath;
      }
    @endphp
    
<figure class="figure">
  <a href="{{route('product.product',['id'=>$v->id])}}"><img src="{{$imagePath}}" class="figure-img img-fluid rounded" alt="..."></a>
  <figcaption class="figure-caption text-left">{{$v->title}}</figcaption>
  <figcaption class="figure-caption text-left price">${{$v->price}}</figcaption>
  <figcaption class="figure-caption text-left"><a href="{{route('product.addToCart',['id'=>$v->id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a></figcaption>
</figure>
  @endforeach

@endsection