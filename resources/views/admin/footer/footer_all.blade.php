@extends('admin.admin_master')
@section('admin')
 <!-- start page title -->
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Footer Page</h4>
                <form action="{{ route('update.footer') }}" method="POST">
                    @csrf
                <input type="hidden" name="id" value="{{ $allfooter->id }}">
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="number" type="text" id="example-text-input" value="{{ $allfooter->number }}">
                    </div>
                </div>

                <!-- end row -->

                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                        <textarea required="" name="short_description"class="form-control" rows="5">{{ $allfooter->short_description }}
                        </textarea>
                    </div>
                </div>

                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="address" type="text" id="example-text-input" value="{{ $allfooter->address }}">
                    </div>
                </div>

                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="email" type="email" id="example-text-input" value="{{ $allfooter->email }}">
                    </div>
                </div>

                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="facebook" type="text" id="example-text-input" value="{{ $allfooter->facebook }}">
                    </div>
                </div>

                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="twitter" type="text" id="example-text-input" value="{{ $allfooter->twitter }}">
                    </div>
                </div>

                <!-- end row -->
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="copyright" type="text" id="example-text-input" value="{{ $allfooter->copyright }}">
                    </div>
                </div>

                <!-- end row -->


               <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light" value="Update Footer Page">
            </form>


            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection
