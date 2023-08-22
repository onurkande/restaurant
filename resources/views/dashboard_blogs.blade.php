@extends('layouts.main')
@section('title','Dashboard Add Blog')
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
    <!--=========================
        DASHBOARD START
    ==========================-->
    <section class="tf__dashboard mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="tf__dashboard_area">
                <div class="row">
                    @livewire('site.dashboard-sidebar')
                    <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s">
                        <div class="tf__dashboard_content">
                            <div class="tf_dashboard_body">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Blogs</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Title Image</th>
                                                    <th>Title</th>
                                                    <th>Content</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($records as $record)
                                                    <tr>
                                                        <td>{{$record->id}}</td>
                                                        <td>
                                                            <img src="{{asset('site/blogimage/'.$record->titleImage)}}" alt="Image" width="300">
                                                        </td>
                                                        <td>{{$record->title}}</td>
                                                        
                                                        <td>{{ Str::limit($record->content, 500) }}</td>
                                                        <td>
                                                            <a href="{{url('/dashboard-edit-blog/'.$record->id)}}" ><button class="btn btn-primary">Edit</button></a>
                                                            <a href="{{url('/dashboard-delete-blog/'.$record->id)}}" ><button class="btn btn-danger">Delete</button></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        DASHBOARD END 
    ==========================-->
@endsection