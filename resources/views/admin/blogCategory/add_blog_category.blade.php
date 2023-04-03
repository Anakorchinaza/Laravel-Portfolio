@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Blog Category</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                       <form id="catForm" action="{{ route('insert.blog.category') }}" method="POST">
                            @csrf
                                <input type="hidden" name="id" value="">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="form-group col-sm-10">
                                    <input name="blog_category" class="form-control" type="text" value="" id="example-text-input">
                                    {{-- @error('blog_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                            </div>
                           
                            <!-- end row -->

                            <div class="row mb-3">
                               
                                <div class="col-sm-10">
                                   <input type="submit" name="" class="btn btn-info waves-effect waves-light" value="Add Blog Category">
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


<script type="text/javascript">
    $(document).ready(function(){
        $('#catForm').validate({
            rules: {
                blog_category: {
                    required : true,
                },
            },

            messages : {
                blog_category: {
                    required: 'Field Required',
                },
            },

            errorElement : 'span',
            errorPlacement: function (error, element){
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            }
        })
    })
</script>




@endsection