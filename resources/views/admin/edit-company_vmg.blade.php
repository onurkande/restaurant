@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Company Vmg</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('dashboard/dynamic-edit/update-company_vmg/'.$records->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$records->title}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Icon</label>
                        <input type="text" class="form-control" name="icon" value="{{$records->icon}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Content</label>
                        <textarea rows="6" cols="100" name="content">{{$records->content}}</textarea>
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