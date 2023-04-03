@extends('admin.admin_master')
@section('admin')
    
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Portfolio</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Portfolio Data</h4>
                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>


                            <tbody>
                                @php($s = 1)
                                @foreach ($all_portfolio as $item )
                                    <tr>
                                        <td>{{ $s++ }}</td>
                                        <td>{{ $item->portfolio_name }}</td>
                                        <td>{{ $item->portfolio_title }}</td>
                                        <td><img src="{{ asset($item->portfolio_image) }}" alt="images" style="width:60px; height:50px"></td>
                                        <td>{!! substr($item->portfolio_description, 0, 30) !!}</td>
                                        <td>
                                            <a href="{{ route('edit.portfolio', $item->id) }}" class="btn btn-info waves-effect waves-light me-3" title="Edit Portfolio"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('delete.portfolio', $item->id) }}" id="delete" class="btn btn-danger waves-effect waves-light" title="Delete Portfolio"><i class=" fas fa-trash-alt"></i></a>
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