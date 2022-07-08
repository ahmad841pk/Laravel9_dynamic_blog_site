@extends('admin.admin_master')
@section('admin')
 <!-- start page title -->
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Profile Page</h4>
                <form action="{{ route('update.slider') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <input type="hidden" name="id" value="{{ $homeslide->id }}">
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="title" type="text" id="example-text-input" value="{{ $homeslide->title }}">
                    </div>
                </div>

                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="short_title" type="text" id="example-text-input" value="{{ $homeslide->short_title  }}">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Vedio Url</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="video_url" type="text" id="example-text-input" value="{{ $homeslide->video_url}}">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Slider image</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="home_slide" type="file" id="image" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($homeslide->home_slide))?url( $homeslide->home_slide):url('upload/no_image.jpg')  }}" alt="Card image cap">
                    </div>
                </div>
               <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Slide">
            </form>


            </div>
        </div>
    </div> <!-- end col -->
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
