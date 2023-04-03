@extends('admin.admin_master')
@section('admin')

@include('admin.body.footer')
    
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Contact Message</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Contact Messages</h4>
                        
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>


                            <tbody>
                                @php($s = 1)
                                @foreach ($all_message as $item )
                                    <tr>
                                        <td>{{ $s++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{!! substr($item->subject, 0, 20) !!}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{!! substr($item->message, 0, 20) !!}</td>
                                        <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ $item->id }}" class="btn btn-info waves-effect waves-light me-3" 
                                                data-myname="<?php echo $item['name']; ?>" 
                                                data-myemail="{{ $item->email }}" 
                                                data-c_mysubject="{{ $item->subject }}" 
                                                data-c_myphoneno="{{ $item->phone }}" 
                                                data-c_mymessage="{{ $item->message }}" 
                                                data-c_mydate={{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                title="Edit Portfolio" data-bs-toggle="modal" data-bs-target="#contactmessage"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('delete.message', $item->id) }}" id="delete" class="btn btn-danger waves-effect waves-light" title="Delete Portfolio"><i class=" fas fa-trash-alt"></i></a>
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