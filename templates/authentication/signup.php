<?php

namespace templates\authentication;

use libraries\korn\client\KornHeader;

KornHeader::constructHeader("Sign up");

?>

<main class="container mt-5">
	<article>
		<div class="my-4 text-center">
			<h1 class="display-4">Expenser</h1>
			<p>Your expense tracking website.</p>
		</div>
		<div class="card">
			<h2 class="card-header text-center text-bg-primary">Sign up</h2>
			<div class="card-body">
				<form action="/api/authentication/signup.php" method="post">
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="form-floating mb-3">
								<input required id="name_firstname" class="form-control" type="text" placeholder="First name">
								<label for="name_firstname">First name</label>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-floating mb-3">
								<input required id="name_lastname" class="form-control" type="text" placeholder="Last name">
								<label for="name_lastname">Last name</label>
							</div>
						</div>
						<div class="col-12 mb-3">
							<div class="form-floating mb-3">
								<input required id="email" class="form-control" type="email" placeholder="Username">
								<label for="email">Email Address</label>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-floating mb-3">
								<input required id="password" minlength="8" class="form-control" type="password" placeholder="Password">
								<label for="password">Password</label>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-floating mb-3">
								<input required id="confirm_password" minlength="8" class="form-control" type="password" placeholder="Conform">
								<label for="confirm_password">Confirm</label>
							</div>
						</div>
					</div>
					<div class="d-grid mx-auto">
						<button class="btn btn-primary btn-block fw-bold" type="submit" value="submit">Sign up</button>
					</div>
				</form>
				<p class="card-text mt-3">Already a member? <a href="/">Sign in now</a></p>
			</div>
		</div>
	</article>
</main>
