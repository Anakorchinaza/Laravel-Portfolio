@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Service Page</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                       <form action="{{ route('update.service') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" name="id" value="{{ $editservice->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Service Title</label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" value="{{ $editservice->title }}" id="example-text-input">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <input name="short_description" class="form-control" type="text" value="{{ $editservice->short_description }}" id="example-text-input">
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="body">{{ $editservice->body }}</textarea>
                                    @error('body')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Service Image</label>
                                <div class="col-sm-10">
                                    <input name="image" class="form-control" type="file" id="image">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{
                                        asset($editservice->image)
                                    }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Service Icon</label>
                                <div class="col-sm-10">
                                    <input name="icon" class="form-control" type="file" id="image2">
                                    @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage2" src="{{
                                        asset($editservice->icon)
                                    }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                               
                                <div class="col-sm-10">
                                   <input type="submit" name="" class="btn btn-info waves-effect waves-light" value="Update Portfolio">
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

<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>

<script>
    $(document).ready(function(){
        $('#image2').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage2').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>




@endsection