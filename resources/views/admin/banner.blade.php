@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
        <a href="{{url('/dashboard/dynamic-edit/deleteBannerImage/')}}"><button type="button" class="button btn btn-danger">delete banner</button></a>  
            <h4>Banner</h4>
        </div>
        <div class="card-body">
        @if($records)
            <form method="POST" action="{{url('dashboard/dynamic-edit/banner-update/'.$records->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Title*</label>
                        <input type="text" class="form-control" name="title" value="{{$records->title}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Message</label>
                        <input type="text" class="form-control" name="message" value="{{$records->message}}">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Download Url</label>
                        @php
                            $url = json_decode($records->url, TRUE);
                        @endphp
                        @foreach($url as $single)
                            <input type="text" class="form-control" name="url[]" value="{{$single}}">
                        @endforeach
                        <section id="more-url">
                        </section>
                        <div>
                            <a onclick="addRRows()"><button type="button">+</button></a>
                            <a onclick="removeRRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">İmage*</label>
                        <br>
                        @php
                            $images = json_decode($records->image, TRUE);
                        @endphp
                            {{-- MODAL --}}
                                <div class="container">
                                    <details>
                                        <summary>
                                            <div class="button">
                                                Show to images
                                            </div>
                                        </summary>
                                        <div class="details-modal">
                                            <div class="details-modal-title">
                                                <h1>IMAGES</h1>
                                            </div>
                                            <div class="details-modal-content">
                                                @foreach ($images as $image)
                                                    <img src="{{asset('admin/bannerimage/'.$image)}}" width="300">
                                                    <input type="hidden" class="form-control" name="oldImage[]" value="{{$image}}">
                                                    <a href="{{url('/dashboard/dynamic-edit/deleteBannerImage/'.$image)}}"><button type="button" class="button btn btn-danger">delete</button></a>                                                   
                                                @endforeach
                                            </div>
                                        </div>
                                    </details>
                                </div>
                            {{-- END MODAL --}}
                        <br>
                        <input type="file" class="form-control" name="image[]">
                        <section id="more-image">
                        </section>
                        <div>
                            <a onclick="addRows()"><button type="button">+</button></a>
                            <a onclick="removeRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
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
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="col-md-6">
                        <label for="">Message</label>
                        <input type="text" class="form-control" name="message">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Download Url</label>
                        <input type="text" class="form-control" name="url[]">
                        <section id="more-url">
                        </section>
                        <div>
                            <a onclick="addRRows()"><button type="button">+</button></a>
                            <a onclick="removeRRows()"><button type="button">-</button></a>
                        </div> 
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">İmage*</label>
                        <input type="file" class="form-control" name="image[]">
                        <section id="more-image">
                        </section>
                        <div>
                            <a onclick="addRows()"><button type="button">+</button></a>
                            <a onclick="removeRows()"><button type="button">-</button></a>
                        </div> 
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
            const moreRows = document.getElementById('more-image');
            const row = document.createElement("div");
            row.innerHTML = '<input type="file" class="form-control" name="image[]">';
            moreRows.appendChild(row);
        }

        function removeRows()
        {
            const rowsSection = document.getElementById("more-image");
            const lastRows = rowsSection.querySelector("div:last-child");
            lastRows.parentElement.removeChild(lastRows);
        }
    </script>

    <script>
        function addRRows() {
            const moreRows = document.getElementById('more-url');
            const inputCount = moreRows.getElementsByTagName('input').length;

            if (inputCount < 1) {
                const row = document.createElement("div");
                row.innerHTML = '<input type="text" class="form-control" name="url[]">';
                moreRows.appendChild(row);
            }
        }

        function removeRRows() {
            const rowsSection = document.getElementById("more-url");
            const inputCount = rowsSection.getElementsByTagName('input').length;

            if (inputCount > 0) {
                const lastRow = rowsSection.lastElementChild;
                rowsSection.removeChild(lastRow);
            }
        }
    </script>
@endsection