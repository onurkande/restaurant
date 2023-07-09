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
            <a href="{{url('/dashboard/dynamic-edit/deleteAll-about/'.$records->id)}}"><button type="button" class="button btn btn-danger">delete about</button></a>  
        @endif
            <h4>About</h4>
        </div>
        <div class="card-body">
        @if($records)
            <form method="POST" action="{{url('dashboard/dynamic-edit/about-update/'.$records->id)}}" enctype="multipart/form-data">
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
                    <div class="col-md-6">
                        <label for="">Info</label>
                        <input type="text" class="form-control" name="info" value="{{$records->info}}">
                    </div>
                </div>

                <br>

                <div class="row">
                    <label for="">Image*</label>
                    <div class="col-md-6">
                        <img src="{{asset('admin/aboutImage/'.$records->image)}}" width="300">
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
                    $messageRows = json_decode($records->messageRows, TRUE);
                    //dd($messageRows[1][0]);
                @endphp
                    <div class="row">
                        <label for="">Message Rows</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title3[]" placeholder="title3" value="{{ $messageRows[0][0] ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="content3[]" placeholder="writer" value="{{ $messageRows[1][0] ?? '' }}">
                        </div>
                    </div>

                <br>

                @php
                    $rows = json_decode($records->rows, TRUE);
                @endphp
                @foreach ($rows as $single)
                    <div class="row">
                        <label for="">Rows</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title2[]" placeholder="title2" oninput="checkInputRowsValues()" value="{{ $single['title'] }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="content2[]" placeholder="content2" oninput="checkInputRowsValues()" value="{{ $single['content'] }}">
                        </div>
                    </div>
                    <a href="{{url('/dashboard/dynamic-edit/delete-about/'.$single['title'])}}"><button type="button" class="button btn btn-danger">delete rows</button></a>  
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
                        <label for="">Info</label>
                        <input type="text" class="form-control" name="info">
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
                    <label for="">Message Rows</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="title3[]" placeholder="title3">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="content3[]" placeholder="writer">
                    </div>
                </div>

                <br>

                <div class="row">
                    <label for="">Rows</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="title2[]" placeholder="title2" oninput="checkInputRowsValues()">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="content2[]" placeholder="content2" oninput="checkInputRowsValues()">
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
            row.innerHTML = '<div class="row"><div class="col-md-6"><input type="text" class="form-control" name="title2[]" placeholder="title2" oninput="checkInputRowsValues()" required></div><div class="col-md-6"><input type="text" class="form-control" name="content2[]" placeholder="content2" oninput="checkInputRowsValues()" required></div><div class="col-md-6"></div></div><br>';
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

            function checkInputRowsValues() 
        {
            const titleInput = document.querySelector('input[name="title2[]"]');
            const contentInput = document.querySelector('input[name="content2[]"]');
            const iconInput = document.querySelector('input[name="icon[]"]');

            if (titleInput.value !== '' && contentInput.value === '' && iconInput.value === '') {
                contentInput.setCustomValidity('Please fill in the infoRowsUrl');
                iconInput.setCustomValidity('Please fill in the icon');
            } else if (titleInput.value === '' && contentInput.value !== '' && iconInput.value === '') {
                titleInput.setCustomValidity('Please fill in the infoRowsUrl');
                iconInput.setCustomValidity('Please fill in the icon');
            } else if (titleInput.value === '' && contentInput.value === '' && iconInput.value !== '') {
                titleInput.setCustomValidity('Please fill in the infoRowsUrl');
                contentInput.setCustomValidity('Please fill in the infoRowsUrl');
            } else {
                titleInput.setCustomValidity('');
                contentInput.setCustomValidity('');
                iconInput.setCustomValidity('');
            }
        }
    </script>

@endsection