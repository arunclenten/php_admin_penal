<?php
include("header.php");
?>


<style>
    .box {
        border: 1px solid #ccc;
        padding: 20px;
    }

    .box-image {
        position: relative;
    }

    .icon-1 {
        text-align: end;
        margin-top: -20px;
    }

    .icon-1 a {
        text-decoration: none;
        color: black;
    }

    .rate {
        align-items: center;
    }

    .box {
        border: 1px solid #ccc;
        padding: 20px;
    }

    .box-image {
        position: relative;
        cursor: pointer;
    }

    .box-image img {
        max-width: 100%;
        transition: transform 0.3s ease;
    }

    .box-image img.zoomed {
        transform: scale(1.5);
    }

    .box-image:hover .icon {
        display: block;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <label for="bsValidation9" class="form-label">place</label>
            <select id="bsValidation9" class="form-select" required="">
                <option selected="" disabled="" value="">Choose</option>
                <option>Manual user</option>
                <option>Mediator</option>
            </select>

        </div>
        <div class="col-md-3">
            <label for="bsValidation9" class="form-label">Status</label>
            <select id="bsValidation9" class="form-select" required="">
                <option selected="" disabled="" value="">Choose</option>
                <option>Sold</option>
                <option>Unsold</option>
            </select>

        </div>
        <div class="col-md-3">
            <label for="bsValidation1" class="form-label">No Units </label>
            <input type="text" class="form-control" id="bsValidation1" placeholder="800" value="" required="">
            <!-- <div class="valid-feedback">
											Looks good!
										  </div> -->
        </div>
        <div class="col-md-3 mt-4 text-center">
            <button class="btn btn-primary">Show </button>
            <!-- <label for="bsValidation1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="bsValidation1" placeholder="Name" value="" required=""> -->
            <!-- <div class="valid-feedback">
											Looks good!
										  </div> -->
        </div>

    </div>
    <div class="row">
        <!-- Left column for box model -->
        <div class="col-md-3">
            <div class="box mt-5">
                <div class="icon-1">
                    <a href="" data-toggle="modal" data-target="#exampleModal"> <i class="h2">+</i></a>
                </div>
                <h3 class="text-center"><Strong>Units :</Strong>001</h3>
                <div class="box-image text-center my-3" onclick="zoomImage(this)">
                    <img src="assets/images/avatars/download.jpeg" alt="Image">
                </div>
                <h5 class="text-center"><strong>Sqrt :</strong>600</h5>
                <div class="text-center mt-3">
                    <p class="text-center btn btn-primary">400000</p>
                </div>
            </div>
        </div>
        <!-- Right column for the modal -->

    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buyer Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="card">
                            <div class="card-header px-4 py-3">
                                <h5 class="mb-0">Create Land</h5>
                            </div>
                            <div class="card-body p-4">
                                <form id="jQueryValidationForm" method="post3" action="#">




                                    <div class="row mb-3">
                                        <label for="input39" class="col-sm-3 col-form-label">Buyer name</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="input39" name="companyname">
                                                <option selected disabled value>Choose ...</option>
                                                <option value="1">Arun clenten</option>
                                                <option value="2">Arun</option>
                                                <option value="3">Clenten</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">

                                        <label for="paymentMethod" class="col-sm-3 col-form-label">Payment Mood </label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-select" id="paymentMethod" onchange="showLoanOptions()">

                                                <option selected disabled value>Choose...</option>
                                                <option value="cash">Cash</option>
                                                <option value="loan">Loan</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3" id="loanOptions" style="display: none;">

                                    <label for="loanType" class="col-sm-3 col-form-label">Loan Type</label>
                                        <div class="col-sm-9">
                                        <select class="form-control form-select" id="loanType">
                                                <option selected disabled value>Choose...</option>
                                                <option value="personal">Personal Loan</option>
                                                <option value="car">Car Loan</option>
                                                <option value="home">Home Loan</option>
                                            </select>
                                        </div>
                                    </div>
                                   



                                    <div class="row mb-3">
                                        <label for="input35" class="col-sm-3 col-form-label">Booking Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="input35" name="companyname" placeholder="Enter Area ">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="input35" class="col-sm-3 col-form-label">Proof</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <div class="d-md-flex d-grid align-items-center gap-3">
                                                <button type="submit" class="btn btn-primary px-4" name="submit2">Sumbit</button>
                                                <!-- <button type="reset" class="btn btn-light px-4">Reset</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function zoomImage(element) {
        element.querySelector('img').classList.toggle('zoomed');
    }
</script>

<script>
    function showLoanOptions() {
        var paymentMethod = document.getElementById("paymentMethod").value;
        var loanOptionsDiv = document.getElementById("loanOptions");
        if (paymentMethod === "loan") {
            loanOptionsDiv.style.display = "block";
        } else {
            loanOptionsDiv.style.display = "none";
        }
    }
</script>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
include("footer.php");
?>