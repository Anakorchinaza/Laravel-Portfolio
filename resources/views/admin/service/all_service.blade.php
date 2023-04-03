@extends('admin.admin_master')
@section('admin')
    
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Service</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Service Data</h4>
                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Title</th>
                                <th>Short_description</th>
                                <th>Image</th>
                                <th>Icon</th>
                                <th>Body</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>


                            <tbody>
                                @php($s = 1)
                                @foreach ($all_service as $item )
                                    <tr>
                                        <td>{{ $s++ }}</td>
                                        <td>{!! substr($item->title, 0, 30) !!}</td>
                                        <td>{!! substr($item->short_description, 0, 30) !!}</td>
                                        <td><img src="{{ asset($item->image) }}" alt="images" style="width:60px; height:50px"></td>
                                        <td><img src="{{ asset($item->icon) }}" alt="images" style="width:60px; height:50px"></td>
                                        <td>{!! substr($item->body, 0, 30) !!}</td>
                                        <td>
                                            <a href="{{ route('edit.service', $item->id) }}" class="btn btn-info waves-effect waves-light me-3" title="Edit Portfolio"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('delete.service', $item->id) }}" id="delete" class="btn btn-danger waves-effect waves-light" title="Delete Portfolio"><i class=" fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

      
        
    </div> <!-- container-fluid -->
</div>

@endsection