<?php 
include("header.php");
?>

<div class="row">
                    <div class="col-lg-8 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Properties</h5>
							</div>
							<div class="card-body p-4">
								<form id="jQueryValidationForm" method="post3" action="#">
									<div class="row mb-3">
										<label for="input35" class="col-sm-3 col-form-label">Enter Company Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input35" name="companyname" placeholder="Enter company Name">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input36" class="col-sm-3 col-form-label">Type</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input36" name="type" placeholder="Type">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input37" class="col-sm-3 col-form-label">Reg.Date</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input37" name="regdate" placeholder="Reg date">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input37" class="col-sm-3 col-form-label">CIN No</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="input38" name="cin" placeholder="CIN NO">
										</div>
									</div>
								
									<div class="row mb-3">
										<label for="input40" class="col-sm-3 col-form-label">Address</label>
										<div class="col-sm-9">
											<textarea class="form-control" id="input40" name="address" rows="3" placeholder="Address"></textarea>
										</div>
									</div>
									<div class="row mb-3">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" id="input41" name="agree">
												<label class="form-check-label" for="input41">Check me out</label>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<div class="d-md-flex d-grid align-items-center gap-3">
												<button type="submit" class="btn btn-primary px-4" name="submit2">Submit</button>
												<!-- <button type="reset" class="btn btn-light px-4">Reset</button> -->
											</div>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>

<?php 
include("footer.php");
?>