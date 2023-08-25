@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Blog Category</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('dashboard/dynamic-edit/update-blog-category/'.$records->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name*</label>
                            <input type="text" class="form-control" name="name" value="{{$records->name}}">
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug*</label>
                            <input type="text" class="form-control" name="slug" value="{{$records->slug}}">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <label for="">Image*</label>
                        <div class="col-md-6">
                            <img src="{{asset('admin/BlogCategoryImage/'.$records->image)}}" width="300">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </form>
        </div>
    </div> 
@endsection