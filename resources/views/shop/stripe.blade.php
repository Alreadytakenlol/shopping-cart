@extends('layouts.master')

@section('title')
    Laravel Shop Cart Stripe
@endsection
<style>
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
#card-errors{
    color: #fa755a;
}
</style>
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-ms-offset-3">
            <h1>Payment Form</h1>
            <h4>Your Total: ${{$total}}</h4>
            @if(Session::has('error_message'))
                <div class="alert alert-danger">交易失敗：{{Session::get('error_message')}}</div>
            @endif
            <form action="{{route('stripepayment')}}" method="POST" id="payment-form">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="Email" id="Email" value="ntou87533@hotmail.com" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="Email">Name</label>
                        <input type="text" name="name" id="name"  class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address"  class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="other">City</label>
                        <input type="text" name="city" id="city" value="" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="fortest">ForTest</label>
                        <input type="text" name="fortest" id="fortest"  class="form-control" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Phone">Phone</label>
                        <input type="text" id="phone" name="phone">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="total">Total</label>
                        <input type="text" id="total" name="total" value="{{$total}}" readonly>
                    </div>
                </div>
                <div class="col-xs-12">
                    <label for="card-element">Credit or debit card</label>
                    <div id="card-element">
                   
                    </div>

                    
                    <div id="card-errors" role="alert"></div>
                </div>
               
                {{csrf_field()}}
                <br/>
                <button type="submit" class="btn btn-success">Submit Payment</button>
            </form>
            
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="{{URL::to('js/checkout.js')}}"></script>
@endsection