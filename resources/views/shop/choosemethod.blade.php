@extends('layouts.master')

@section('title')
    Laravel Shop Cart
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-ms-offset-3">
            <h1>Choosemethod</h1>
            <h4>Your Total: ${{$total}}</h4>
            <form action="{{route('checkout')}}" method="post" id="checkout-form">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="711">7-11</label>
                        <input type="radio" name="Method" id="711" value="711" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="stripe">Stripe</label>
                        <input type="radio" name="Method" id="stripe" value="stripe" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="other">Other</label>
                        <input type="radio" name="Method" id="other" value="other" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="other2">Other2</label>
                        <input type="radio" name="Method" id="other2" value="other2" class="form-control" required>
                    </div>
                </div>
                
               
                {{csrf_field()}}
                
                
            </form>
            <a type="button" class="ahref" href="#"><button class="btn btn-success">Next</button></a>
        </div>
    </div>
@endsection

@section('scripts')
    <script>url="{{URL::to('')}}";</script>
    <script type="text/javascript" src="{{URL::to('js/choosemethod.js')}}"></script>
@endsection