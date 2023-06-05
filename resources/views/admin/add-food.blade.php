@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>add food</h4>
        </div>
        <div class="card-body">
            <form action="{{url('dashboard/dynamic-edit/insert-food')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="col-md-6">
                        <label for="">Old Price</label>
                        <input type="number" class="form-control" name="oldprice">
                    </div>
                    <div class="col-md-6">
                        <label for="">title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                </div>

                <br>

                <label for="">Size</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" placeholder="Large Size Price" class="form-control" name="oldprice">
                    </div>
                    <div class="col-md-6">
                        <input type="number" placeholder="Medium Size Price" class="form-control" name="oldprice">
                    </div>
                    <div class="col-md-6">
                        <input type="number" placeholder="Smoll Size Price" class="form-control" name="oldprice">
                    </div>
                </div>

                <br>
   
                <label for="">extra</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="extra[]">
                    </div>
                </div>

                <br>

                <div>
                    <label for="">Description</label><br>
                    <textarea rows="12" cols="100" name="desc"></textarea>
                </div>

                <br>
                    
                <label for="">Description Row</label>
                <div  class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="desc_row[]">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>    
@endsection