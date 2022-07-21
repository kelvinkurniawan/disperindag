<div
	class="modal fade"
	id="registerModal"
	tabindex="-1"
	aria-labelledby="exampleModalLabel"
	aria-hidden="true"
>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 text-center mb-5">
						<h3 style="color: #104b0b; font-weight: 700">Register</h3>
					</div>
					<div class="col-md-12 mt-5">
						<form>
							<div class="row">
								<div class="col-md-6 mb-3">
									<input
										type="text"
										class="form-control register-firstname"
										placeholder="First Name"
									/>
								</div>
								<div class="col-md-6 mb-3">
									<input
										type="text"
										class="form-control register-lastname"
										placeholder="Last Name"
									/>
								</div>
								<div class="col-md-6 mb-3">
									<input
										type="text"
										class="form-control register-email"
										placeholder="email"
									/>
								</div>
								<div class="col-md-6 mb-3">
									<input
										type="text"
										class="form-control register-password"
										placeholder="Password"
									/>
								</div>
								<div class="col-md-6 mb-3">
									<input
										type="text"
										class="form-control register-occupation"
										placeholder="Occupation"
									/>
								</div>
								<div class="col-md-6 mb-3">
									<input
										type="text"
										class="form-control register-mobile"
										placeholder="Mobile"
									/>
								</div>
								<div class="col-md-6 mb-3">
									<input
										type="text"
										class="form-control register-organization"
										placeholder="Organization"
									/>
								</div>
								<div class="col-md-6 mb-3">
									<input
										type="text"
										class="form-control register-city"
										placeholder="City"
									/>
								</div>
							</div>
							<div class="mb-3 text-center">
								<a
									class="btn btn-login"
									href="javascript:void(0)"
									onclick="doRegister()"
									>Register</a
								>
							</div>
							<div class="mb-3 text-center">
								Already have an account ?
								<a class="link fw-bold" onclick="fireLoginModal()">Login</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
