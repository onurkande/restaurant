@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit food</h4>
        </div>
        <div class="card-body">
            <form action="{{url('dashboard/dynamic-edit/update-foods/'.$records->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id">
                            @foreach ($category as $single)
                                <option value="{{ $single->id }}" @if ($single->id == $records->category->id) selected @endif>
                                    {{ $single->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$records->name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$records->slug}}">
                    </div>
                </div>

                <br>

                <div>
                    <label for="">Content</label><br>
                    <textarea rows="6" cols="100" name="content">{{$records->content}}</textarea>
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
                            <input type="text" class="form-control" name="extra[]" oninput="checkInputValues()" required value="{{$single}}">
                        @endforeach
                        <section id="more-extra">
                        </section>
                        <div>
                            <a onclick="addRows()"><button type="button">+</button></a>
                            <a onclick="removeRows()"><button type="button">-</button></a>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <label for="">extra price</label>
                        @php
                            $extra_price=json_decode($records->extra_price, TRUE);
                        @endphp
                        @foreach($extra_price as $single)
                            <input type="number" class="form-control" name="extra_price[]" oninput="checkInputValues()" required value="{{$single}}">
                        @endforeach
                        <section id="more-extra-price">
                        </section>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Qty</label>
                        <input type="number" class="form-control" name="qty" value="{{$records->qty}}">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">currency</label>
                        <input type="text" class="form-control" name="currency" value="{{$records->currency}}">
                    </div>
                </div>

                <br>

                <div>
                    <label for="">Description</label><br>
                    <textarea rows="12" cols="100" name="desc">{{$records->desc}}</textarea>
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
            const moreExtraRows = document.getElementById('more-extra');
            const moreExtraPriceRows = document.getElementById('more-extra-price');
            
            const row = document.createElement("div");
            row.innerHTML = '<input type="text" class="form-control" name="extra[]" oninput="checkInputValues()" required>';
            moreExtraRows.appendChild(row);
            
            const priceRow = document.createElement("div");
            priceRow.innerHTML = '<input type="number" class="form-control" name="extra_price[]" oninput="checkInputValues()" required>';
            moreExtraPriceRows.appendChild(priceRow);
        }

        function removeRows() 
        {
            const extraRowsSection = document.getElementById("more-extra");
            const extraPriceRowsSection = document.getElementById("more-extra-price");
            
            const lastExtraRow = extraRowsSection.querySelector("div:last-child");
            lastExtraRow.parentElement.removeChild(lastExtraRow);
            
            const lastExtraPriceRow = extraPriceRowsSection.querySelector("div:last-child");
            lastExtraPriceRow.parentElement.removeChild(lastExtraPriceRow);
        }
    </script>

    <script>
        function checkInputValues()
        {
            const extraInput = document.querySelector('input[name="extra[]"]');
            const priceInput = document.querySelector('input[name="extra_price[]"]');
            
            if (extraInput.value !== '' && priceInput.value === '') {
                priceInput.setCustomValidity('Please fill in the extra price');
            } else if (extraInput.value === '' && priceInput.value !== '') {
                extraInput.setCustomValidity('Please fill in the extra');
            } else {
                extraInput.setCustomValidity('');
                priceInput.setCustomValidity('');
            }
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