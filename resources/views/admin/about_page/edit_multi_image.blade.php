@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Update Multi Image</h4>

                       <form action="{{ route('update.multi.image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" name="id" value="{{  $allimages->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Update Multi Image</label>
                                <div class="col-sm-10">
                                    <input name="multi_image" class="form-control" type="file" id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{
                                         asset($allimages->multi_image)
                                    }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                               
                                <div class="col-sm-10">
                                   <input type="submit" name="" class="btn btn-info waves-effect waves-light" value="Update Image">
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




@endsection