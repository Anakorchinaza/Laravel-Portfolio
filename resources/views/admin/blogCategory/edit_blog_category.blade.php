@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Blog Category</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                       <form action="{{ route('update.blog.category',  $editBlogCategory->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10">
                                    <input name="blog_category" class="form-control" type="text" value="{{ $editBlogCategory->blog_category }}" id="example-text-input">
                                    @error('blog_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                               
                                <div class="col-sm-10">
                                   <input type="submit" name="" class="btn btn-info waves-effect waves-light" value="Update Blog Category">
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