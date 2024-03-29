@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Sing Up</h1>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
        <form action="{{route('user.signup')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Sing Up</button>
            
            
        </form>
    </div>
</div>
@endsection