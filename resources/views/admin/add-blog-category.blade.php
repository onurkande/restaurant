@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Blog Category</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('dashboard/dynamic-edit/insert-blog-category')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name*</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug*</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Image*</label>
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