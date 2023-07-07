@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Company-vmg</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('dashboard/dynamic-edit/insert-company_vmg')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="col-md-6">
                        <label for="">Icon</label>
                        <input type="text" class="form-control" name="icon">
                    </div>
                    <div class="col-md-6">
                        <label for="">Content</label>
                        <textarea rows="6" cols="100" name="content"></textarea>
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