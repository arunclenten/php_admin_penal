<?php 
include("header.php");
?>

<div class="row">
                    <div class="col-lg-8 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Sub Properties</h5>
							</div>
							<div class="card-body p-4">
								<form id="jQueryValidationForm" method="post3" action="#">
									
									<div class="row mb-3">
										<label for="input39" class="col-sm-3 col-form-label">Select Company name </label>
										<div class="col-sm-9">
											<select class="form-select" id="input39" name="companyname">
												<option selected disabled value>Choose...</option>
												<option value="1">GHL INDIA</option>
												<option value="2">jamin properties</option>
												<!-- <option value="3">Three</option> -->
											  </select>
										</div>
									</div>

									<div class="row mb-3">
										<label for="input35" class="col-sm-3 col-form-label">Properties Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input40" name="propertiesname" placeholder="Enter properties Name">
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