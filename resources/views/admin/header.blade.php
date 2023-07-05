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
            <h4>Header</h4>
        </div>
        <div class="card-body">
        @if($records)
            <form method="POST" action="{{url('dashboard/dynamic-edit/header-update/'.$records->id)}}" enctype="multipart/form-data">
                @csrf
                <div  class="row">
                    <label for="">image</label>
                    <div class="col-md-6">
                        <img src="{{asset('admin/headerimage/'.$records->image)}}" width="300">
                    </div>
                </div>

                <br>

                <div  class="row">
                    <div class="col-md-6">
                        <label for="">image*</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-6">
                        <label for="">image Url*</label>
                        <input type="text" class="form-control" name="imageUrl" value="{{$records->imageUrl}}">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Info Rows</label>
                        @php
                            $infoRows = json_decode($records->infoRows, TRUE);
                        @endphp
                        @foreach($infoRows as $single)
                            <input type="text" class="form-control" name="infoRows[]" value="{{$single}}" oninput="checkInputinfoRowsValues()">
                        @endforeach
                        <section id="more-infoRows">
                        </section>
                        <div>
                            <a onclick="addinfoRows()"><button type="button">+</button></a>
                            <a onclick="removeinfoRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">Info Rows Url</label>
                        @php
                            $infoRowsUrl = json_decode($records->infoRowsUrl, TRUE);
                        @endphp
                        @foreach($infoRowsUrl as $single)
                            <input type="text" class="form-control" name="infoRowsUrl[]" value="{{$single}}" oninput="checkInputinfoRowsValues()">
                        @endforeach
                        <section id="more-infoRowsUrl">
                        </section>
                    </div>
                    <div class="col-md-6">
                        <label for="">Info Rows Icon</label>
                        @php
                            $infoRowsIcon = json_decode($records->infoRowsIcon, TRUE);
                        @endphp
                        @foreach($infoRowsIcon as $single)
                            <input type="text" class="form-control" name="infoRowsIcon[]" value="{{$single}}" oninput="checkInputinfoRowsValues()">
                        @endforeach
                        <section id="more-infoRowsIcon">
                        </section>
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
                            <input type="text" class="form-control" name="icons[]" value="{{$single}}" oninput="checkInputiconsValues()">
                        @endforeach
                        <section id="more-icons">
                        </section>
                        <div>
                            <a onclick="addicons()"><button type="button">+</button></a>
                            <a onclick="removeicons()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">Icons Url</label>
                        @php
                            $iconsUrl = json_decode($records->iconsUrl, TRUE);
                        @endphp
                        @foreach($iconsUrl as $single)
                            <input type="text" class="form-control" name="iconsUrl[]" value="{{$single}}" oninput="checkInputiconsValues()">
                        @endforeach
                        <section id="more-iconsUrl">
                        </section>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Pages</label>
                        @php
                            $pages = json_decode($records->pages, TRUE);
                        @endphp
                        @foreach($pages as $single)
                            <input type="text" class="form-control" name="pages[]" value="{{$single}}" oninput="checkInputpagesValues()">
                        @endforeach
                        <section id="more-pages">
                        </section>
                        <div>
                            <a onclick="addpages()"><button type="button">+</button></a>
                            <a onclick="removepages()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">Icons Url</label>
                        @php
                            $pagesUrl = json_decode($records->pagesUrl, TRUE);
                        @endphp
                        @foreach($pagesUrl as $single)
                            <input type="text" class="form-control" name="pagesUrl[]" value="{{$single}}" oninput="checkInputpagesValues()">
                        @endforeach
                        <section id="more-pagesUrl">
                        </section>
                    </div>
                </div>

                <br>

                {{-- ====== header on index page ======= --}}

                <h1 class="text-success">
                Header On Index Page
                </h1>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Index Message</label>
                        <input type="text" class="form-control" name="indexMessage" value="{{$records->indexMessage}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Index Title</label>
                        <input type="text" class="form-control" name="indexTitle" value="{{$records->indexTitle}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Index Content</label>
                        <input type="text" class="form-control" name="indexContent" value="{{$records->indexContent}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Index Discount Message</label>
                        <input type="text" class="form-control" name="indexDiscountMessage" value="{{$records->indexDiscountMessage}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">index Search Name</label>
                        <input type="text" class="form-control" name="indexSearchName" value="{{$records->indexSearchName}}">
                    </div>
                </div>
                
                <br>

                <div class="row">
                    <label for="">Index Image</label>
                    <div class="col-md-6">
                        <img src="{{asset('admin/headerimage/'.$records->indexImage)}}" width="300">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="file" class="form-control" name="indexImage">
                    </div>
                </div>

                <br>
                <br>
                <br>
                
                {{-- ====== Header for other pages ======= --}}

                <h1 class="text-primary">
                Header For Other Pages
                </h1>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Op Title</label>
                        <input type="text" class="form-control" name="opTitle" value="{{$records->opTitle}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Op Small Title</label>
                        <input type="text" class="form-control" name="opSmallTitle" value="{{$records->opSmallTitle}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Op Small Title Icon</label>
                        <input type="text" class="form-control" name="opSmallTitleIcon" value="{{$records->opSmallTitleIcon}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Op Small Title Url</label>
                        <input type="text" class="form-control" name="opSmallTitleUrl" value="{{$records->opSmallTitleUrl}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Op Small Title 2</label>
                        <input type="text" class="form-control" name="opSmallTitle2" value="{{$records->opSmallTitle2}}">
                    </div>
                </div>

                <br>

                <div class="row">
                    <label for="">Op Image</label>
                    <div class="col-md-6">
                        <img src="{{asset('admin/headerimage/'.$records->opImage)}}" width="300">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="file" class="form-control" name="opImage">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            <form> 
        @else
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div  class="row">
                    <div class="col-md-6">
                        <label for="">image*</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="col-md-6">
                        <label for="">image Url*</label>
                        <input type="text" class="form-control" name="imageUrl">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Info Rows</label>
                        <input type="text" class="form-control" name="infoRows[]" oninput="checkInputinfoRowsValues()">
                        <section id="more-infoRows">
                        </section>
                        <div>
                            <a onclick="addinfoRows()"><button type="button">+</button></a>
                            <a onclick="removeinfoRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">Info Rows Url</label>
                        <input type="text" class="form-control" name="infoRowsUrl[]" oninput="checkInputinfoRowsValues()">
                        <section id="more-infoRowsUrl">
                        </section>
                    </div>
                    <div class="col-md-6">
                        <label for="">Info Rows Icon</label>
                        <input type="text" class="form-control" name="infoRowsIcon[]" oninput="checkInputinfoRowsValues()">
                        <section id="more-infoRowsIcon">
                        </section>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Icons</label>
                        <input type="text" class="form-control" name="icons[]" oninput="checkInputiconsValues()">
                        <section id="more-icons">
                        </section>
                        <div>
                            <a onclick="addicons()"><button type="button">+</button></a>
                            <a onclick="removeicons()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">Icons Url</label>
                        <input type="text" class="form-control" name="iconsUrl[]" oninput="checkInputiconsValues()">
                        <section id="more-iconsUrl">
                        </section>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Pages</label>
                        <input type="text" class="form-control" name="pages[]" oninput="checkInputpagesValues()">
                        <section id="more-pages">
                        </section>
                        <div>
                            <a onclick="addpages()"><button type="button">+</button></a>
                            <a onclick="removepages()"><button type="button">-</button></a>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <label for="">Pages Url</label>
                        <input type="text" class="form-control" name="pagesUrl[]" oninput="checkInputpagesValues()">
                        <section id="more-pagesUrl">
                        </section>
                    </div>
                </div>

                <br>

                {{-- ====== header on index page ======= --}}

                <h1 class="text-success">
                Header On Index Page
                </h1>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Index Message</label>
                        <input type="text" class="form-control" name="indexMessage">
                    </div>
                    <div class="col-md-6">
                        <label for="">Index Title</label>
                        <input type="text" class="form-control" name="indexTitle">
                    </div>
                    <div class="col-md-6">
                        <label for="">Index Content</label>
                        <input type="text" class="form-control" name="indexContent">
                    </div>
                    <div class="col-md-6">
                        <label for="">Index Discount Message</label>
                        <input type="text" class="form-control" name="indexDiscountMessage">
                    </div>
                    <div class="col-md-6">
                        <label for="">Index Search Name</label>
                        <input type="text" class="form-control" name="indexSearchName">
                    </div>
                    <div class="col-md-6">
                        <label for="">Index Image</label>
                        <input type="file" class="form-control" name="indexImage">
                    </div>
                </div>

                <br>
                <br>
                <br>
                
                {{-- ====== Header for other pages ======= --}}

                <h1 class="text-primary">
                Header For Other Pages
                </h1>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Op Title</label>
                        <input type="text" class="form-control" name="opTitle">
                    </div>
                    <div class="col-md-6">
                        <label for="">Op Small Title</label>
                        <input type="text" class="form-control" name="opSmallTitle">
                    </div>
                    <div class="col-md-6">
                        <label for="">Op Small Title Icon</label>
                        <input type="text" class="form-control" name="opSmallTitleIcon">
                    </div>
                    <div class="col-md-6">
                        <label for="">Op Small Title Url</label>
                        <input type="text" class="form-control" name="opSmallTitleUrl">
                    </div>
                    <div class="col-md-6">
                        <label for="">Op Small Title 2</label>
                        <input type="text" class="form-control" name="opSmallTitle2">
                    </div>
                    <div class="col-md-6">
                        <label for="">Op Image</label>
                        <input type="file" class="form-control" name="opImage">
                    </div>
                </div>

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
        function addinfoRows() {
            const moreInfoRows = document.getElementById('more-infoRows');
            const moreInfoRowsUrl = document.getElementById('more-infoRowsUrl');
            const moreInfoRowsIcon = document.getElementById('more-infoRowsIcon');
            
            const infoRowsCount = moreInfoRows.childElementCount;
            if (infoRowsCount < 1) {
                const row = document.createElement("div");
                row.innerHTML = '<input type="text" class="form-control" name="infoRows[]" oninput="checkInputinfoRowsValues()" required>';
                moreInfoRows.appendChild(row);
                
                const urlRow = document.createElement("div");
                urlRow.innerHTML = '<input type="text" class="form-control" name="infoRowsUrl[]" oninput="checkInputinfoRowsValues()" required>';
                moreInfoRowsUrl.appendChild(urlRow);

                const iconRow = document.createElement("div");
                iconRow.innerHTML = '<input type="text" class="form-control" name="infoRowsIcon[]" oninput="checkInputinfoRowsValues()" required>';
                moreInfoRowsIcon.appendChild(iconRow);
            }
        }


        function removeinfoRows() {
            const infoRowsSection = document.getElementById("more-infoRows");
            const infoRowsUrlSection = document.getElementById("more-infoRowsUrl");
            const infoRowsIconSection = document.getElementById("more-infoRowsIcon");

            const lastInfoRows = infoRowsSection.lastElementChild;
            infoRowsSection.removeChild(lastInfoRows);

            const lastInfoRowsUrl = infoRowsUrlSection.lastElementChild;
            infoRowsUrlSection.removeChild(lastInfoRowsUrl);

            const lastInfoRowsIcon = infoRowsIconSection.lastElementChild;
            infoRowsIconSection.removeChild(lastInfoRowsIcon);
        }

        function checkInputinfoRowsValues() {
            const extraInput = document.querySelector('input[name="infoRows[]"]');
            const priceInput = document.querySelector('input[name="infoRowsUrl[]"]');

            if (extraInput.value !== '' && priceInput.value === '') {
                priceInput.setCustomValidity('Please fill in the infoRowsUrl');
            } else if (extraInput.value === '' && priceInput.value !== '') {
                extraInput.setCustomValidity('Please fill in the infoRowsUrl');
            } else {
                extraInput.setCustomValidity('');
                priceInput.setCustomValidity('');
            }
        }
    </script>

    <script>
        function addicons() {
            const moreIcons = document.getElementById('more-icons');
            const moreIconsUrl = document.getElementById('more-iconsUrl');

            const row = document.createElement("div");
            row.innerHTML = '<input type="text" class="form-control" name="icons[]" oninput="checkInputiconsValues()" required>';
            moreIcons.appendChild(row);

            const Row = document.createElement("div");
            Row.innerHTML = '<input type="text" class="form-control" name="iconsUrl[]" oninput="checkInputiconsValues()" required>';
            moreIconsUrl.appendChild(Row);
        }

        function removeicons() {
            const iconsSection = document.getElementById("more-icons");
            const iconsUrlSection = document.getElementById("more-iconsUrl");

            const lastIcons = iconsSection.lastElementChild;
            iconsSection.removeChild(lastIcons);

            const lastIconsUrl = iconsUrlSection.lastElementChild;
            iconsUrlSection.removeChild(lastIconsUrl);
        }

        function checkInputiconsValues() {
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
        function addpages() {
            const morePages = document.getElementById('more-pages');
            const morePagesUrl = document.getElementById('more-pagesUrl');

            const row = document.createElement("div");
            row.innerHTML = '<input type="text" class="form-control" name="pages[]" oninput="checkInputpagesValues()" required>';
            morePages.appendChild(row);

            const Row = document.createElement("div");
            Row.innerHTML = '<input type="text" class="form-control" name="pagesUrl[]" oninput="checkInputpagesValues()" required>';
            morePagesUrl.appendChild(Row);
        }

        function removepages() {
            const pagesSection = document.getElementById("more-pages");
            const pagesUrlSection = document.getElementById("more-pagesUrl");

            const lastPages = pagesSection.lastElementChild;
            pagesSection.removeChild(lastPages);

            const lastPagesUrl = pagesUrlSection.lastElementChild;
            pagesUrlSection.removeChild(lastPagesUrl);
        }

        function checkInputpagesValues() {
            const extraInput = document.querySelector('input[name="pages[]"]');
            const priceInput = document.querySelector('input[name="pagesUrl[]"]');

            if (extraInput.value !== '' && priceInput.value === '') {
                priceInput.setCustomValidity('Please fill in the pagesUrl');
            } else if (extraInput.value === '' && priceInput.value !== '') {
                extraInput.setCustomValidity('Please fill in the pagesUrl');
            } else {
                extraInput.setCustomValidity('');
                priceInput.setCustomValidity('');
            }
        }
    </script>
@endsection