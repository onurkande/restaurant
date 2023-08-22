@extends('layouts.main')
@section('title','Dashboard Add Blog')
@section('content')
    <!--=========================
        DASHBOARD START
    ==========================-->
    <section class="tf__dashboard mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="tf__dashboard_area">
                <div class="row">
                    @livewire('site.dashboard-sidebar')
                    <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s">
                        <div class="tf__dashboard_content">
                            <div class="tf_dashboard_body">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Add Blog</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{url('dashboard-insert-blog')}}" enctype="multipart/form-data">
                                            @csrf

                                            {{-- <input type="hidden" class="form-control" name="user_id" value="{{}}"> --}}

                                            <div  class="row">
                                                <label for="">Title Image</label>
                                                <div class="col-md-6">
                                                    <input type="file" class="form-control" name="titleImage">
                                                </div>
                                            </div>

                                            <br>


                                            <div  class="row">
                                                <div class="col-md-6">
                                                    <label for="">Title</label>
                                                    <input type="text" class="form-control" name="title">
                                                </div>
                                            </div>

                                            <br>

                                            <div  class="row">
                                                <label for="">Content</label>
                                                <div class="col-md-12">
                                                    <textarea rows="6" cols="100" name="content"></textarea>
                                                </div>
                                            </div>

                                            <br>

                                            {{-- <div  class="row">
                                                <div class="col-md-6">
                                                    <section id="more-image-1">
                                                    </section>
                                                </div>
                                            </div>

                                            <br>

                                            <div  class="row">
                                                <div class="col-md-6">
                                                    <a onclick="addImage(1)"><button type="button" class="btn btn-info">Image Ekle</button></a>
                                                    <a onclick="removeImage(1)"><button type="button" class="btn btn-danger">Image Sil</button></a>
                                                </div>
                                            </div> 

                                            <br> --}}

                                            <div  class="row">
                                                <label for="">Line</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="lines[]">
                                                    <section id="more-line">
                                                    </section>
                                                </div>
                                            </div>

                                            <br>

                                            <div  class="row">
                                                <div class="col-md-1">
                                                    <a onclick="addLine()"><button type="button" class="btn btn-success">Arttır</button></a><br>
                                                </div>
                                                <div class="col-md-1">
                                                    <a onclick="removeLine()"><button type="button" class="btn btn-danger">Sil</button></a>
                                                </div>
                                            </div>

                                            <br>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        DASHBOARD END 
    ==========================-->
@endsection
@section('script')
    <script>
        function addLine() {
            const moreRows = document.getElementById('more-line');
            const row = document.createElement("div");
            row.innerHTML = '<input type="text" class="form-control" name="lines[]">';
            moreRows.appendChild(row);
        }

        function removeLine() {
            const rowsSection = document.getElementById("more-line");
            const lastRows = rowsSection.querySelector("div:last-child");
            lastRows.parentElement.removeChild(lastRows);
        }


        function addImage(imageId) {
            const moreRows = document.getElementById('more-image-' + imageId);
            const RowsCount = moreRows.childElementCount;
            if (RowsCount < 1) 
            {
                const row = document.createElement("div");
                row.innerHTML = '<input type="file" class="form-control" name="image[]">';
                moreRows.appendChild(row);
            }
        }

        function removeImage(imageId) {
            const rowsSection = document.getElementById("more-image-" + imageId);
            const lastRows = rowsSection.querySelector("div:last-child");
            lastRows.parentElement.removeChild(lastRows);
        }
    </script>
@endsection