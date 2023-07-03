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
            <a href="{{url('/dashboard/dynamic-edit/delete-banner/'.$records->id)}}"><button type="button" class="button btn btn-danger">delete banner</button></a>  
        @endif
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
                        <input type="text" class="form-control" name="url[]">
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
@endsection