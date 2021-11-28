@extends('layouts.admin')

@section('title','Add Account')

@section('main')


<form action="{{route('account.store')}}"  method="POST">
    @csrf

    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name">
        @error('name')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Phone</label>
        <input type="text" class="form-control" name="phone" >
        @error('phone')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" >
        @error('email')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password">
        @error('password')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password">
        @error('confirm_password')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>

        <button type="submit" class="btn btn-primary">Save Data</button>
</form>
 
@stop