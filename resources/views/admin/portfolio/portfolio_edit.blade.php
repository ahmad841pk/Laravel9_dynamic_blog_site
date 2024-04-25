@extends('admin.admin_master')
@section('admin')
 <!-- start page title -->
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Portfolio Edit Page</h4>
                <form action="{{ route('update.portfolio') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <input type="hidden" name="id" value="{{ $portfolio->id }}">
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">portfolio Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="portfolio_name" type="text" id="example-text-input" value="{{ $portfolio->portfolio_name }}">
                    @error('portfolio_name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>

                    @enderror
                    </div>
                </div>

                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="portfolio_title" type="text" id="example-text-input" value="{{ $portfolio->portfolio_title }}" >
                        @error('portfolio_title')
                        <span class="text-danger">
                            {{ $message }}
                        </span>

                        @enderror
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="portfolio_description">
                        {{ $portfolio->portfolio_description }}
                        </textarea>
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio image</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="portfolio_image" type="file" id="image">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg" src="{{ asset($portfolio->portfolio_image) }}" alt="Card image cap">
                    </div>
                </div>
               <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update portfolio Data">
            </form>


            </div>
        </div>
    </div>
</div>

        <script>
            $(document).ready(function(){
                $('#image').change(function(e){
                  var reader = new FileReader();
                  reader.onload=function(e){
                    $('#showImage').attr('src',e.target.result);
                  }
                  reader.readAsDataURL(e.target.files['0']);
                })
            })
        </script>
@endsection

