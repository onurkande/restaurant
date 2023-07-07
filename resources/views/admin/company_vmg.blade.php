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
        @if($records)
            <a href="{{url('/dashboard/dynamic-edit/deleteAll-company_vmg')}}"><button type="button" class="button btn btn-danger">delete company_vmg</button></a>  
        @endif
            <h4>Company_vmg</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Icon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td>{{$record->id}}</td>
                            <td>{{$record->title}}</td>
                            <td>{!!$record->icon!!}</td>
                            <td>
                                <a href="{{url('/dashboard/dynamic-edit/edit-company_vmg/'.$record->id)}}" ><button class="btn btn-primary">Edit</button></a>
                                <a href="{{url('/dashboard/dynamic-edit/delete-company_vmg/'.$record->id)}}" ><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
@endsection