<?php 
include("header.php");
?>

<div class="row">
                    <div class="col-lg-8 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Create Land</h5>
							</div>
							<div class="card-body p-4">
								<form id="jQueryValidationForm" method="post3" action="#">

                                <div class="row mb-3">
										<label for="input35" class="col-sm-3 col-form-label">Land Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input35" name="companyname" placeholder="Enter land Name">
										</div>
									</div>


                                <div class="row mb-3">
										<label for="input39" class="col-sm-3 col-form-label">Properties Category</label>
										<div class="col-sm-9">
											<select class="form-select" id="input39" name="companyname">
												<option selected disabled value>Choose Category ...</option>
												<option value="1">GHL INDIA</option>
												<option value="2">jamin properties</option>
												<!-- <option value="3">Three</option> -->
											  </select>
										</div>
									</div>

                                    <div class="row mb-3">
										<label for="input39" class="col-sm-3 col-form-label">Sub Properties</label>
										<div class="col-sm-9">
											<select class="form-select" id="input39" name="companyname">
										
												<option selected disabled value>Choose Properties...</option>
												<option value="1">GHL INDIA</option>
												<option value="2">jamin properties</option>
												<!-- <option value="3">Three</option> -->
											  </select>
										</div>
									</div>
									<div class="row mb-3">
										<label for="input35" class="col-sm-3 col-form-label">Total Area</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input35" name="companyname" placeholder="Enter Area ">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input36" class="col-sm-3 col-form-label">Total Sqrt</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input36" name="type" placeholder="Enter Sqrt ">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input37" class="col-sm-3 col-form-label">Total Units</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input37" name="regdate" placeholder="Enter Units">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input37" class="col-sm-3 col-form-label">Location</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="input38" name="URL" placeholder="URL">
										</div>
									</div>
								
									<div class="row mb-3">
										<label for="input40" class="col-sm-3 col-form-label">One Sqrt Rate </label>
										<div class="col-sm-9">
										<input type="email" class="form-control" id="input38" name="Rate" placeholder="Rate">
										</div>
									</div>
                                    <div class="mb-3">
									<label for="formFile" class="form-label">Land image (Baner)</label>
									<input class="form-control" type="file" id="formFile">
								</div>
                                <div class="mb-3">
									<label for="formFile" class="form-label">Brochures</label>
									<input class="form-control" type="file" id="formFile">
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
												<button type="submit" class="btn btn-primary px-4" name="submit2">create</button>
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