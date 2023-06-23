@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>add category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('dashboard/dynamic-edit/update-chefs/'.$records->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$records->name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Position</label>
                        <input type="text" class="form-control" name="position" value="{{$records->position}}">
                    </div>
                </div>

                <br>

                <label for="">İmage</label>
                <div class="row">
                    <div class="col-md-6">
                        @if($records->image)
                            <img src="{{asset('admin/chefsimage/'.$records->image)}}" width="300">
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
                        <label for="">İcon Name</label>
                        @php
                            $icons=json_decode($records->icons, TRUE);
                        @endphp
                        @foreach($icons as $icon)
                            <input type="text" class="form-control" name="icons[]" oninput="checkInputValues()" value="{{$icon}}">
                        @endforeach
                        <section id="more-icons">
                        </section>
                        <div>
                            <a onclick="addRows()"><button type="button">+</button></a>
                            <a onclick="removeRows()"><button type="button">-</button></a>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <label for="">İcon Url</label>
                        @php
                            $iconsUrl=json_decode($records->iconsUrl, TRUE);
                        @endphp
                        @foreach($iconsUrl as $iconUrl)
                            <input type="text" class="form-control" name="iconsUrl[]" oninput="checkInputValues()" value="{{$iconUrl}}">
                        @endforeach
                        <section id="more-iconsUrl">
                        </section> 
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
            const moreIconsRows = document.getElementById('more-icons');
            const moreIconsUrlRows = document.getElementById('more-iconsUrl');
            
            const row = document.createElement("div");
            row.innerHTML = '<input type="text" class="form-control" name="icons[]">';
            moreIconsRows.appendChild(row);
            
            const Row = document.createElement("div");
            Row.innerHTML = '<input type="text" class="form-control" name="iconsUrl[]">';
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
            const IconsInput = document.querySelector('input[name="icons[]"]');
            const IconsUrlInput = document.querySelector('input[name="iconsUrl[]"]');
            
            if (IconsInput.value !== '' && IconsUrlInput.value === '') {
                IconsUrlInput.setCustomValidity('Please fill in the extra price');
            } else if (IconsInput.value === '' && IconsUrlInput.value !== '') {
                IconsInput.setCustomValidity('Please fill in the extra');
            } else {
                IconsInput.setCustomValidity('');
                IconsUrlInput.setCustomValidity('');
            }
        }
    </script>
@endsection