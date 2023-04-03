@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Footer Page</h4>
                       <form action="{{ route('update.footer') }}" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="{{ $footer->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                    <input name="number" class="form-control" type="text" value="{{ $footer->number }}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea required="" name="short_description" class="form-control" rows="5">{{ $footer->short_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input name="address" class="form-control" type="text" value="{{ $footer->address }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email Address</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" value="{{ $footer->email }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Facebook URL</label>
                                <div class="col-sm-10">
                                    <input name="facebook" class="form-control" type="text" value="{{ $footer->facebook }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Twitter URL</label>
                                <div class="col-sm-10">
                                    <input name="twitter" class="form-control" type="text" value="{{ $footer->twitter }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10">
                                    <input name="copyright" class="form-control" type="text" value="{{ $footer->copyright }}">
                                </div>
                            </div>
                            <!-- end row -->

                         

                            <div class="row mb-3">
                               
                                <div class="col-sm-10">
                                   <input type="submit" name="" class="btn btn-info waves-effect waves-light" value="Update">
                                </div>
                            </div>
                            <!-- end row -->
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>






@endsection