@extends('layouts\admin')

@section('title','Edit Category')

@section('main')


<form action="{{route('category.update',$category->id)}}" method="POST" role="form">
    @csrf @method('PUT')

    <input type="hidden" name="id" value="{{$category->id}}">
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" value="{{$category->name}}" class="form-control" name="name" placeholder="Input name">
        @error('name')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>


    <div class="form-group">
        <label for="">Status</label>

        <div class="radio">
            <label for="">
                <input type="radio" name="status" value="1" checked>
                Public
            </label>
            <label for="">
                <input type="radio" name="status" value="0">
                Private
            </label>
        </div>
        <div class="form-group">
            <label for="">Prioty</label>
            <input type="number" value="{{$category->prioty}}" class="form-control" name="prioty" placeholder="Input prioty">
            @error('prioty')
            <small class="help-block">{{$message}}</small>
            @enderror
        </div>
        
    </div>

        <button type="submit" class="btn btn-primary">Save Data</button>
</form>
 
@stop
