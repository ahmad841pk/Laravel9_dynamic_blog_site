@extends('admin.admin_master')
@section('admin')
 <!-- start page title -->
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">About Multi image</h4><br><br>
                <form action="{{ route('update.multi.image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
               <input type="hidden" name="id" value="{{ $multiImage->id }}">
                <!-- start of  row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">About Multi image</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="multi_image" type="file" id="image">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg" src="{{ asset($multiImage->multi_image)  }}" alt="Card image cap">
                    </div>
                </div>
               <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="update multi Image">
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
