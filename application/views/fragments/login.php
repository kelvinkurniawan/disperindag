<div
	class="modal fade"
	id="loginModal"
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
						<h3 style="color: #104b0b; font-weight: 700">Login</h3>
					</div>
					<div class="col-md-12 mt-5">
						<form>
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label"
									>Email address</label
								>
								<input
									type="email"
									class="form-control login-email"
									id="exampleInputEmail1"
								/>
							</div>
							<div class="mb-3">
								<label for="exampleInputPassword1" class="form-label"
									>Password</label
								>
								<input
									type="password"
									class="form-control login-password"
									id="exampleInputPassword1"
								/>
							</div>
							<div class="mb-3 text-center">
								<a class="btn btn-login" onclick="doLogin()">Login</a>
							</div>
							<div class="mb-3 text-center">
								Don't have an account ?
								<a class="link fw-bold" onclick="fireRegisterModal()"
									>Register</a
								>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
