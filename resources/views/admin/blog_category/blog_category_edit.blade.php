@extends('admin.admin_master')
@section('admin')
 <!-- start page title -->
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Blog Category Page</h4><br><br>
                <form action="{{ route('update.blog.category',$blogcategory->id) }}" method="POST" >
                    @csrf
                {{-- <input type="hidden" name="id" value=""> --}}
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog category Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="blog_category" type="text" id="example-text-input" value="{{ $blogcategory->blog_category }}">
                    @error('blog_category')
                    <span class="text-danger">
                        {{ $message }}
                    </span>

                    @enderror
                    </div>
                </div>

                <!-- end row -->


                <!-- end row -->


                <!-- end row -->


               <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Blog Category Data">
            </form>


            </div>
        </div>
    </div>
</div>

@endsection

