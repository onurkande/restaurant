@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Counter</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('dashboard/dynamic-edit/update-counter/'.$records->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$records->title}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Number</label>
                        <input type="number" class="form-control" name="number" value="{{$records->number}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Icon</label>
                        <input type="text" class="form-control" name="icon" value="{{$records->icon}}">
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