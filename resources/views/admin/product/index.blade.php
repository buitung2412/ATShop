@extends('layouts.admin')

@section('title','Product List')
@section('main')


<form action="" class="form-inline">

    <div class="form-group">
        <input class="form-control" name="key" placeholder="Search">
    </div>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>

<hr>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Sale</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Image</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $model)
        <tr>
            <td>{{$model->id}}</td>
            <td>{{$model->name}}</td>
            <td>{{$model->cat->name}} </td>
            <td>{{$model->price}}</td>
            <td>{{$model->sale_price}}</td>
            <td>
                @if($model->status == 0)
                    <span class="badge badge-danger">Private </span>
                @else
                    <span class="badge badge-success">Public </span>
                @endif
            </td>
            <td>{{$model->created_at->format('d-m-Y')}}</td>
            <td>
                <img src="{{url('public/uploads')}}/{{$model->image}}" width="50px">
            </td>
            <td class="text-right">


                <a href="{{route('product.edit',$model->id)}}" class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('product.destroy',$model->id)}}" class="btn btn-sm btn-danger btndelete">
                    <i class="fas fa-trash"></i>
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<form method="POST" action="" id="form-delete">
    @csrf @method('DELETE')
</form>

<hr>

<div class="">
    {{$data->appends(request()->all())->links()}}
</div>

@stop()

@section('js')

<script>
    $('.btndelete').click(function(ev)
    {
        ev.preventDefault();
        var _herf = $(this).attr('href');
        $('form#form-delete').attr('action',_herf);
        if(confirm('Bạn có chắc muốn xóa nó không?'))
        {
            $('form#form-delete').submit();
        }

    })
</script>

@stop
