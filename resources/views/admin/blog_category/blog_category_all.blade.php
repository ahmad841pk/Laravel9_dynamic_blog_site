@extends('admin.admin_master')
@section('admin')
                   <!-- start page title -->
                   <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Blog_Category All</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Blog Category All Data</h4>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Blog Category Name</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                   @php
                                        $i=1;
                                   @endphp

                                    <tbody>
                                        @foreach ( $blogcategory as $key => $item )

                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->blog_category }}</td>
                                        <td><a href="{{ route('edit.blog.category',$item->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i> </a>
                                            <a href="{{ route('delete.blog.category',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class=" fas fa-trash-alt"></i> </a>
                                            </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

@endsection
