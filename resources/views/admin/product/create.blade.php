@extends('layouts\admin')

@section('title','Add Product')

@section('main')

<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-9">

            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Input name">
                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Description</label>

                <textarea name="description" id="content" class="form-control" placeholder="Input name"></textarea>

                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

        </div>
        <div class="col-md-3">

            <div class="form-group">

                <label for="">Category</label>


                <select name="category_id" class="form-control">
                    <option value="">--SELECT ONE--</option>
                    @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>

                    @endforeach
                </select>

                @error('name')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Input price">
                @error('price')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Sale Price</label>
                <input type="text" class="form-control" name="sale_price" placeholder="Input sale_price">
                @error('sale_price')
                <small class="help-block">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="file_upload" placeholder="Input image">
                @error('image')
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
                    <input type="number" class="form-control" name="prioty" placeholder="Input prioty">
                    @error('prioty')
                    <small class="help-block">{{$message}}</small>
                    @enderror
                </div>
                
            </div>


        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save Data</button>
</form>

@stop

@section('css');

<link rel="stylesheet" href="{{url('public/ad123')}}/plugins/summernote/summernote-bs4.min.css">

@stop()

@section('js')

<script src="{{url('public/ad123')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        $('#content').summernote({
            height: 200,
            placeholder: "Product description"
        });
    })
</script>
@stop()
