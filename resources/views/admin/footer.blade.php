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
            <h4>Footer</h4>
        </div>
        <div class="card-body">
        @if($records)
            <form method="POST" action="{{url('dashboard/dynamic-edit/footer-update/'.$records->id)}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Content*</label>
                        <textarea rows="7" cols="100" name="content">{{$records->content}}</textarea>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Icons</label>
                        @php
                            $icons = json_decode($records->icons, TRUE);
                        @endphp
                        @foreach($icons as $single)
                            <input type="text" class="form-control" name="icons[]" value="{{$single}}" oninput="checkInputValues()">
                        @endforeach
                        <section id="more-icons">
                        </section>
                        <div>
                            <a onclick="addRows()"><button type="button">+</button></a>
                            <a onclick="removeRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">İcons Url</label>
                        @php
                            $iconsUrl = json_decode($records->iconsUrl, TRUE);
                        @endphp
                        @foreach($iconsUrl as $single)
                            <input type="text" class="form-control" name="iconsUrl[]" value="{{$single}}" oninput="checkInputValues()">
                        @endforeach
                        <section id="more-iconsUrl">
                        </section>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Title 1</label>
                        <input type="text" class="form-control" name="ShTitle" value="{{$records->ShTitle}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Rows 1</label>
                        @php
                            $Shrows = json_decode($records->Shrows, TRUE);
                        @endphp
                        @foreach($Shrows as $single)
                            <input type="text" class="form-control" name="Shrows[]" value="{{$single}}" oninput="checkInputShrowsValues()">
                        @endforeach
                        <section id="more-Shrows">
                        </section>
                        <div>
                            <a onclick="addShrows()"><button type="button">+</button></a>
                            <a onclick="removeShrows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">Rows 1 Url</label>
                        @php
                            $ShRowsUrl = json_decode($records->ShRowsUrl, TRUE);
                        @endphp
                        @foreach($ShRowsUrl as $single)
                            <input type="text" class="form-control" name="ShRowsUrl[]" value="{{$single}}" oninput="checkInputShrowsValues()">
                        @endforeach
                        <section id="more-ShRowsUrl">
                        </section>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Title 2</label>
                        <input type="text" class="form-control" name="HlTitle" value="{{$records->HlTitle}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Rows 2</label>
                        @php
                            $HlRows = json_decode($records->HlRows, TRUE);
                        @endphp
                        @foreach($HlRows as $single)
                            <input type="text" class="form-control" name="HlRows[]" value="{{$single}}" oninput="checkInputHlRowsValues()">
                        @endforeach
                        <section id="more-HlRows">
                        </section>
                        <div>
                            <a onclick="addHlRows()"><button type="button">+</button></a>
                            <a onclick="removeHlRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">Rows 2 Url</label>
                        @php
                            $HlRowsUrl = json_decode($records->HlRowsUrl, TRUE);
                        @endphp
                        @foreach($HlRowsUrl as $single)
                            <input type="text" class="form-control" name="HlRowsUrl[]" value="{{$single}}" oninput="checkInputHlRowsValues()">
                        @endforeach
                        <section id="more-HlRowsUrl">
                        </section>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Title 3</label>
                        <input type="text" class="form-control" name="CuTitle" value="{{$records->CuTitle}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Rows 3</label>
                        @php
                            $CuRows = json_decode($records->CuRows, TRUE);
                        @endphp
                        @foreach($CuRows as $single)
                            <input type="text" class="form-control" name="CuRows[]" value="{{$single}}">
                        @endforeach
                        <section id="more-CuRows">
                        </section>
                        <div>
                            <a onclick="addCuRows()"><button type="button">+</button></a>
                            <a onclick="removeCuRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">Contact Us Icons</label>
                        @php
                            $CuIcons = json_decode($records->CuIcons, TRUE);
                        @endphp
                        @foreach($CuIcons as $single)
                            <input type="text" class="form-control" name="CuIcons[]" value="{{$single}}">
                        @endforeach
                        <section id="more-CuIcons">
                        </section>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Bottom Content*</label>
                        <textarea rows="2" cols="100" name="bottom">{{$records->bottom}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        @else
            <form method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Content*</label>
                        <textarea rows="7" cols="100" name="content"></textarea>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">İcons</label>
                        <input type="text" class="form-control" name="icons[]" oninput="checkInputValues()">
                        <section id="more-icons">
                        </section>
                        <div>
                            <a onclick="addRows()"><button type="button">+</button></a>
                            <a onclick="removeRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">İcons Url</label>
                        <input type="text" class="form-control" name="iconsUrl[]" oninput="checkInputValues()">
                        <section id="more-iconsUrl">
                        </section>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Title 1</label>
                        <input type="text" class="form-control" name="ShTitle">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Rows 1</label>
                        <input type="text" class="form-control" name="Shrows[]" oninput="checkInputShrowsValues()">
                        <section id="more-Shrows">
                        </section>
                        <div>
                            <a onclick="addShrows()"><button type="button">+</button></a>
                            <a onclick="removeShrows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">Rows 1 Url</label>
                        <input type="text" class="form-control" name="ShRowsUrl[]" oninput="checkInputShrowsValues()">
                        <section id="more-ShRowsUrl">
                        </section>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Title 2</label>
                        <input type="text" class="form-control" name="HlTitle">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Rows 2</label>
                        <input type="text" class="form-control" name="HlRows[]" oninput="checkInputHlRowsValues()">
                        <section id="more-HlRows">
                        </section>
                        <div>
                            <a onclick="addHlRows()"><button type="button">+</button></a>
                            <a onclick="removeHlRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">Rows 2 Url</label>
                        <input type="text" class="form-control" name="HlRowsUrl[]" oninput="checkInputHlRowsValues()">
                        <section id="more-HlRowsUrl">
                        </section>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Title 3</label>
                        <input type="text" class="form-control" name="CuTitle">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Rows 3</label>
                        <input type="text" class="form-control" name="CuRows[]">
                        <section id="more-CuRows">
                        </section>
                        <div>
                            <a onclick="addCuRows()"><button type="button">+</button></a>
                            <a onclick="removeCuRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">Contact Us Icons</label>
                        <input type="text" class="form-control" name="CuIcons[]">
                        <section id="more-CuIcons">
                        </section>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Bottom Content*</label>
                        <textarea rows="2" cols="100" name="bottom"></textarea>
                    </div>
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
        function addRows() 
        {
            const moreIconsRows = document.getElementById('more-icons');
            const moreIconsUrlRows = document.getElementById('more-iconsUrl');
            
            const row = document.createElement("div");
            row.innerHTML = '<input type="text" class="form-control" name="icons[]" oninput="checkInputValues()" required>';
            moreIconsRows.appendChild(row);
            
            const Row = document.createElement("div");
            Row.innerHTML = '<input type="text" class="form-control" name="iconsUrl[]" oninput="checkInputValues()" required>';
            moreIconsUrlRows.appendChild(Row);
        }

        function removeRows() 
        {
            const IconsRowsSection = document.getElementById("more-icons");
            const IconsUrlRowsSection = document.getElementById("more-iconsUrl");
            
            const lastIconsRows = IconsRowsSection.querySelector("div:last-child");
            lastIconsRows.parentElement.removeChild(lastIconsRows);
            
            const lastIconsUrlRows= IconsUrlRowsSection.querySelector("div:last-child");
            lastIconsUrlRows.parentElement.removeChild(lastIconsUrlRows);
        }
    </script>

    <script>
        function checkInputValues()
        {
            const extraInput = document.querySelector('input[name="icons[]"]');
            const priceInput = document.querySelector('input[name="iconsUrl[]"]');
            
            if (extraInput.value !== '' && priceInput.value === '') {
                priceInput.setCustomValidity('Please fill in the iconsUrl');
            } else if (extraInput.value === '' && priceInput.value !== '') {
                extraInput.setCustomValidity('Please fill in the iconsUrl');
            } else {
                extraInput.setCustomValidity('');
                priceInput.setCustomValidity('');
            }
        }
    </script>

    <script>
        function addShrows()
        {
            const moreShRows = document.getElementById('more-Shrows');
            const moreShRowsUrl = document.getElementById('more-ShRowsUrl');
            
            const row = document.createElement("div");
            row.innerHTML = '<input type="text" class="form-control" name="Shrows[]" oninput="checkInputShrowsValues()" required>';
            moreShRows.appendChild(row);
            
            const Row = document.createElement("div");
            Row.innerHTML = '<input type="text" class="form-control" name="ShRowsUrl[]" oninput="checkInputShrowsValues()" required>';
            moreShRowsUrl.appendChild(Row);
        }

        function removeShrows() {
            const ShrowsSection = document.getElementById("more-Shrows");
            const ShRowsUrlSection = document.getElementById("more-ShRowsUrl");

            const lastShrows = ShrowsSection.lastElementChild;
            ShrowsSection.removeChild(lastShrows);

            const lastShRowsUrl = ShRowsUrlSection.lastElementChild;
            ShRowsUrlSection.removeChild(lastShRowsUrl);
        }
    </script>

    <script>
        function checkInputShrowsValues() {
            const extraInput = document.querySelector('input[name="Shrows[]"]');
            const priceInput = document.querySelector('input[name="ShRowsUrl[]"]');

            if (extraInput.value !== '' && priceInput.value === '') {
                priceInput.setCustomValidity('Please fill in the ShRowsUrl');
            } else if (extraInput.value === '' && priceInput.value !== '') {
                extraInput.setCustomValidity('Please fill in the ShRowsUrl');
            } else {
                extraInput.setCustomValidity('');
                priceInput.setCustomValidity('');
            }
        }
    </script>

    <script>
        function addHlRows() {
            const moreHlRows = document.getElementById('more-HlRows');
            const moreHlRowsUrl = document.getElementById('more-HlRowsUrl');
            
            const row = document.createElement("div");
            row.innerHTML = '<input type="text" class="form-control" name="HlRows[]" oninput="checkInputHlRowsValues()" required>';
            moreHlRows.appendChild(row);
            
            const Row = document.createElement("div");
            Row.innerHTML = '<input type="text" class="form-control" name="HlRowsUrl[]" oninput="checkInputHlRowsValues()" required>';
            moreHlRowsUrl.appendChild(Row);
        }

        function removeHlRows() {
            const HlRowsSection = document.getElementById("more-HlRows");
            const HlRowsUrlSection = document.getElementById("more-HlRowsUrl");

            const lastHlRows = HlRowsSection.lastElementChild;
            HlRowsSection.removeChild(lastHlRows);

            const lastHlRowsUrl = HlRowsUrlSection.lastElementChild;
            HlRowsUrlSection.removeChild(lastHlRowsUrl);
        }
    </script>

    <script>
        function checkInputHlRowsValues() {
            const extraInput = document.querySelector('input[name="HlRows[]"]');
            const priceInput = document.querySelector('input[name="HlRowsUrl[]"]');

            if (extraInput.value !== '' && priceInput.value === '') {
                priceInput.setCustomValidity('Please fill in the HlRowsUrl');
            } else if (extraInput.value === '' && priceInput.value !== '') {
                extraInput.setCustomValidity('Please fill in the HlRowsUrl');
            } else {
                extraInput.setCustomValidity('');
                priceInput.setCustomValidity('');
            }
        }
    </script>

    <script>
        function addCuRows() {
            const moreCuRows = document.getElementById('more-CuRows');
            const moreCuIcons = document.getElementById('more-CuIcons');
            
            const row = document.createElement("div");
            row.innerHTML = '<input type="text" class="form-control" name="CuRows[]">';
            moreCuRows.appendChild(row);
            
            const Row = document.createElement("div");
            Row.innerHTML = '<input type="text" class="form-control" name="CuIcons[]">';
            moreCuIcons.appendChild(Row);
        }

        function removeCuRows() {
            const CuRowsSection = document.getElementById("more-CuRows");
            const CuIconsSection = document.getElementById("more-CuIcons");

            const lastCuRows = CuRowsSection.lastElementChild;
            CuRowsSection.removeChild(lastCuRows);

            const lastCuIcons = CuIconsSection.lastElementChild;
            CuIconsSection.removeChild(lastCuIcons);
        }
    </script>
@endsection