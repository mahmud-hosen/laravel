<!-- Contact Us  Modal  -->
<!-- The Modal -->

<div class="modal text-light" id="contact-modal">
    <div class="container">
        <div class="modal-dialog ">
            <div class="modal-content bg-dark ">

                <!-- Modal Header -->
                <div class="modal-header ">
                    <h4 class="modal-title text-light  text-center ">Add Customer</h4>
                    <button type="button" class="close text-light " data-dismiss="modal">&times;</button>

                </div>

                <!-- Modal body -->
                <div class="modal-body">


                    <form action="{{route('insert_customer')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Customer Name </label>
                                    <input type="text" name="name" class="form-control " id="name" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Customer Email</label>
                                    <input type="email" name="email" class="form-control" id="email"  required>
                                </div>
                            </div>
                        </div>





                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Customer Phone</label>

                                    <input type="text" name="phone" class="form-control" id="phone" required>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Customer Shop Name</label>
                                    <input type="text" name="shopname" class="form-control" id="shopname" required>
                                </div>
                            </div>
                        </div>





                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Customer Address</label>
                                    <input type="text" name="address" class="form-control" id="address" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Customer City</label>
                                    <input type="text" name="city" class="form-control" id="city" required>
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Account Holder </label>
                                    <input type="text" name="account_holder" class="form-control" id="account_holder" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Account Number</label>
                                    <input type="text" name="account_number" class="form-control" id="account_number" required>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Bank Name </label>
                                    <input type="text" name="bank_name" class="form-control" id="bank_name" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Bank Branch</label>
                                    <input type="text" name="bank_branch" class="form-control" id="bank_branch" required>
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <label for="photo">Image</label>
                                    <input type="file" name="image" accept="image/*" class="upload" required
                                        onchange="readURL(this);">
                                    <img id="image" src="#" />
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary"> Add Customer</button>
                    </form>
                </div>

                <!-- Modal footer -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#image')
                .attr('src', e.target.result)
                .width(50)
                .heigth(50);
        }
        reader.readAsDataURL(input.files[0]);
    }

}
</script>