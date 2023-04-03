<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                Ruby © Upcube.
                {{-- <script>document.write(new Date().getFullYear())</script> © Upcube. --}}
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Ruby
                </div>
            </div>
        </div>
    </div>

     <!-- Modal -->
    <div class="modal fade" id="contactmessage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Contact Message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p style="font-size: 18px;"><strong>Name:</strong> <span id="thename"></span></p>
                            <p style="font-size: 18px;"><strong>Email Address:</strong> <span id="theemail"></span></p>
                            <p style="font-size: 18px;"><strong>Phone Number:</strong> <span id="thephoneno"></span></p>
                            <p style="font-size: 18px;"><strong>Subject:</strong> <span id="thesubject"></span></p>
                            <p style="font-size: 18px;"><strong>Message:</strong> <span id="themessage"></span></p>
                            <p style="font-size: 18px;"><strong>Date:</strong> <span id="thedate"></span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
</footer>