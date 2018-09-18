@extends('layouts.admin-horizontal')
{{-- @section('staff-active','class=menu-top-active') --}}
@section('css')

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<a href="{{route('itemlist.index')}}"><button type="button" class="btn btn-success">Back</button></a><hr>
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('itemlist.update',$item_lists->id) }}">
                        @method('put')
                        @csrf


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$item_lists->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Harga</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" value="{{ $item_lists->price }}" required>
                            </div>
                        </div>

						<input type="hidden" name="id" value="{{$item_lists->id}}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
