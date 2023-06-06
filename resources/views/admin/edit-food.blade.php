@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit food</h4>
        </div>
        {{-- {{dd($records)}} --}}
        <div class="card-body">
            <form action="{{url('dashboard/dynamic-edit/update-foods/'.$records->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select">
                            <option value="">{{$records->category->name}}</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$records->name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">title</label>
                        <input type="text" class="form-control" name="title" value="{{$records->title}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$records->slug}}">
                    </div>
                </div>

                <br>

                <label for="">Price</label>
                <div class="row">
                    @php
                        $price=json_decode($records->price, TRUE);
                    @endphp
                    @foreach($price as $single)
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="price[]" value="{{$single}}">
                        </div>
                    @endforeach
                </div>

                <br>

                <label for="">Old Price</label>
                <div class="row">
                    @php
                        $oldprice=json_decode($records->oldprice, TRUE);
                    @endphp
                    @foreach($oldprice as $single)
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="oldprice[]" value="{{$single}}">
                        </div>
                    @endforeach
                </div>

                <br>
   
                <div class="row">
                    <div class="col-md-6">
                        <label for="">extra</label>
                        @php
                            $extra=json_decode($records->extra, TRUE);
                        @endphp
                        @foreach($extra as $single)
                            <input type="text" class="form-control" name="extra[]" value="{{$single}}">
                        @endforeach
                        <section id="more-extra">
                        </section>
                        <div>
                            <a onclick="addRows()"><button type="button">+</button></a>
                            <a onclick="removeRows()"><button type="button">-</button></a>
                        </div>  
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
                        @php
                            $desc_row=json_decode($records->desc_row, TRUE);
                        @endphp
                        @foreach($desc_row as $single)
                            <input type="text" class="form-control" name="desc_row[]" value="{{$single}}">
                        @endforeach
                        <section id="more-desc_row">
                        </section>
                        <div>
                            <a onclick="addRRows()"><button type="button">+</button></a>
                            <a onclick="removeRRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                </div>

                <br>

                <label for="">image</label>
                <div  class="row">
                    <div class="col-md-6">
                        @if($records->image)
                            <img src="{{asset('admin/foodimage/'.$records->image)}}" width="300">
                        @endif
                    </div>
                </div>
                <div  class="row">
                    <div class="col-md-6">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>

                <br>

                <div  class="row">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary" value="güncelle">
                    </div>
                </div>

            </form>
        </div>
    </div>    
@endsection

@section('script')
    <script>
        function addRows()
        {
            const moreRows = document.getElementById('more-extra');
            const row = document.createElement("div");
            row.innerHTML = '<input type="text" class="form-control" name="extra[]" required>';
            moreRows.appendChild(row);
        }

        function removeRows()
        {
            const rowsSection = document.getElementById("more-extra");
            const lastRows = rowsSection.querySelector("div:last-child");
            lastRows.parentElement.removeChild(lastRows);
        }
    </script>

    <script>
        function addRRows()
        {
            const moreRows = document.getElementById('more-desc_row');
            const row = document.createElement("div");
            row.innerHTML = '<input type="text" class="form-control" name="desc_row[]" required>';
            moreRows.appendChild(row);
        }

        function removeRRows()
        {
            const rowsSection = document.getElementById("more-desc_row");
            const lastRows = rowsSection.querySelector("div:last-child");
            lastRows.parentElement.removeChild(lastRows);
        }
    </script>
@endsection