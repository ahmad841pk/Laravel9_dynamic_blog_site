@extends('admin.admin_master')
@section('admin')
                   <!-- start page title -->
                   <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Multi images All</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Multi Images All</h4>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>About Multi Images</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                   @php
                                        $i=1;
                                   @endphp

                                    <tbody>
                                        @foreach ( $allMultiImage as $item )

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><img src="{{ asset($item->multi_image)}}" alt="" style="height: 50px ; width: 60px"></td>
                                        <td><a href="{{ route('edit.multi.image',$item->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i> </a>
                                            <a href="{{ route('delete.multi.image',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class=" fas fa-trash-alt"></i> </a>
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
