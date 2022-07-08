@extends('admin.admin_master')
@section('admin')
 <!-- start page title -->
<!-- end page title -->
<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Blog Page</h4>
                <form action="{{ route('store.blog') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                {{-- <input type="hidden" name="id" value=""> --}}
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                    <div class="col-sm-10">
                        <select  name= "blog_category_id"class="form-select" aria-label="Default select example">
                            <option selected="">Open this select menu</option>
                            @foreach ($categories as $cat)

                            <option value="{{ $cat->id }}">{{ $cat->blog_category }}</option>

                            @endforeach
                            </select>
                    </div>
                </div>

                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog title</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="blog_title" type="text" id="example-text-input" >
                        @error('blog_title')
                        <span class="text-danger">
                            {{ $message }}
                        </span>

                        @enderror
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog tags</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="blog_tags" type="text" data-role="tagsinput" value="home,tech" >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="blog_description">

                        </textarea>
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog image</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="blog_image" type="file" id="image" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <img id="showImage" class="rounded avatar-lg" src=":url('upload/no_image.jpg')  }}" alt="Card image cap">
                    </div>
                </div>
               <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Insert Blog Data">
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

