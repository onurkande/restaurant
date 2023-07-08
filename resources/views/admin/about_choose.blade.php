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

    @if(session()->has('deleteImage'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('deleteImage') }}
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
            <a href="{{url('/dashboard/dynamic-edit/deleteAll-about_choose/'.$records->id)}}"><button type="button" class="button btn btn-danger">delete about choose</button></a>  
        @endif
            <h4>Banner</h4>
        </div>
        <div class="card-body">
        @if($records)
            <form method="POST" action="{{url('dashboard/dynamic-edit/about_choose-update/'.$records->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Title*</label>
                        <input type="text" class="form-control" name="title1" value="{{$records->title}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Message*</label>
                        <input type="text" class="form-control" name="message" value="{{$records->message}}">
                    </div>
                </div>

                <br>

                <div class="row">
                    <label for="">Image*</label>
                    <div class="col-md-6">
                        @if($records->image)
                            <img src="{{asset('admin/aboutChooseImage/'.$records->image)}}" width="300">
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Content*</label>
                        <textarea rows="6" cols="100" name="content1">{{$records->content}}</textarea>
                    </div>
                </div>

                <br>

                @php
                    $rows = json_decode($records->rows, TRUE);
                @endphp
                @foreach ($rows as $single)
                    <label for="">Rows</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title2[]" placeholder="title" value="{{ $single['title'] }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="content2[]" placeholder="content" value="{{ $single['content'] }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="icon[]" placeholder="icon" value="{{ $single['icon'] }}">
                        </div>
                    </div>
                    <a href="{{url('/dashboard/dynamic-edit/delete-about_choose/'.$single['title'])}}"><button type="button" class="button btn btn-danger">delete rows</button></a>  
                    <br>
                @endforeach
                <div>
                    <a onclick="addRows()"><button type="button">+</button></a>
                    <a onclick="removeRows()"><button type="button">-</button></a>
                </div> 
                <br>
                <section id="more-rows">
                </section>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        @else
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Title*</label>
                        <input type="text" class="form-control" name="title1">
                    </div>
                    <div class="col-md-6">
                        <label for="">Message*</label>
                        <input type="text" class="form-control" name="message">
                    </div>
                    <div class="col-md-6">
                        <label for="">Image*</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Content*</label>
                        <textarea rows="6" cols="100" name="content1"></textarea>
                    </div>
                </div>

                <br>

                <div class="row">
                    <label for="">Rows</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="title2[]" placeholder="title">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="content2[]" placeholder="content">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="icon[]" placeholder="icon">
                    </div>
                    <div>
                        <a onclick="addRows()"><button type="button">+</button></a>
                        <a onclick="removeRows()"><button type="button">-</button></a>
                    </div> 
                </div>
                <br>
                <section id="more-rows">
                </section>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        @endif
        </div>
    </div> 
@endsection

@section('script')
<script>
    function addRows() {
        const moreRows = document.getElementById('more-rows');
        const row = document.createElement("div");
        row.innerHTML = '<div class="row"><div class="col-md-6"><input type="text" class="form-control" name="title2[]" placeholder="title"></div><div class="col-md-6"><input type="text" class="form-control" name="content2[]" placeholder="content"></div><div class="col-md-6"><input type="text" class="form-control" name="icon[]" placeholder="icon"></div></div><br>';
        moreRows.appendChild(row);
    }

    function removeRows() {
        const rowsSection = document.getElementById("more-rows");
        const rows = rowsSection.querySelectorAll("div.row");
        const rowCount = rows.length;
        
        if (rowCount > 0) {
            rows[rowCount - 1].remove();
            rowsSection.lastElementChild.remove();
        }
    }
</script>

@endsection