@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add food</h4>
        </div>
        <div class="card-body">
            <form action="{{url('dashboard/dynamic-edit/insert-foods')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id">
                            <option value="">Select a Category</option>
                            @foreach ($records as $record)
                                <option value="{{$record->id}}">{{ $record->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="col-md-6">
                        <label for="">slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                </div>

                <br>

                <label for="">Price</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" placeholder="Large Size Price" class="form-control" name="price[]">
                    </div>
                    <div class="col-md-6">
                        <input type="number" placeholder="Medium Size Price" class="form-control" name="price[]">
                    </div>
                    <div class="col-md-6">
                        <input type="number" placeholder="Smoll Size Price" class="form-control" name="price[]">
                    </div>
                </div>

                <br>

                <label for="">Old Price</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" placeholder="Large Old Price" class="form-control" name="oldprice[]">
                    </div>
                    <div class="col-md-6">
                        <input type="number" placeholder="Medium Old Price" class="form-control" name="oldprice[]">
                    </div>
                    <div class="col-md-6">
                        <input type="number" placeholder="Small Old Price" class="form-control" name="oldprice[]">
                    </div>
                </div>

                <br>
   
                <div class="row">
                    <div class="col-md-6">
                        <label for="">extra</label>
                        <input type="text" class="form-control" name="extra[]">
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
                        <input type="text" class="form-control" name="desc_row[]">
                        <section id="more-desc_row">
                        </section>
                        <div>
                            <a onclick="addRRows()"><button type="button">+</button></a>
                            <a onclick="removeRRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                </div>

                <br>

                <div  class="row">
                    <div class="col-md-6">
                        <label for="">image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>

                <br>

                <div  class="row">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary" value="kaydet">
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