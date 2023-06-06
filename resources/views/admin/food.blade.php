@extends('layouts.admin')
@section('content')
    @if(session()->has('store'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('store') }}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut();
            }, 5000);
        </script>
    @endif

    @if(session()->has('update'))
        <div class="alert alert-primary" role="alert">
            {{ session()->get('update') }}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut();
            }, 5000);
        </script>
    @endif

    @if(session()->has('delete'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('delete') }}
        </div>
        <script>
            setTimeout(function() {
                $('.alert').fadeOut();
            }, 5000);
        </script>
    @endif

    <div class="card">
        <div class="card-header">
            <h4>Food Page</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td>{{$record->id}}</td>
                            <td>{{$record->name}}</td>
                            <td>{{$record->category->name}}</td>
                            <td>
                                <img src="{{asset('admin/foodimage/'.$record->image)}}" alt="Image" width="300">
                            </td>
                            <td>
                                <a href="{{url('/dashboard/dynamic-edit/edit-foods/'.$record->id)}}" ><button class="btn btn-primary">Edit</button></a>
                                <a href="{{url('/dashboard/dynamic-edit/delete-category/'.$record->id)}}" ><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
@endsection