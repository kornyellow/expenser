<?php

namespace templates\authentication;

use libraries\korn\client\KornHeader;

KornHeader::constructHeader("Sign in");

?>

<link rel="stylesheet" href="/static/css/signin.css">

<main class="row mx-auto w-100 mt-5">
	<div class="signin-form d-grid col-12 col-xl-4 col-lg-6 col-md-8 col-sm-10 mx-auto">
		<div class="mb-4 text-center">
			<h1>Expenser</h1>
			<p>Your expense tracking website.</p>
		</div>
		<div class="card">
			<h2 class="card-header text-center text-bg-primary">Sign in</h2>
			<div class="card-body">
				<form action="/api/authentication/signin.php" method="post">
					<div class="form-floating mb-3">
						<input required id="email" class="form-control" type="email" placeholder="Username">
						<label for="email">Email Address</label>
					</div>
					<div class="form-floating mb-3">
						<input required id="password" minlength="8" class="form-control" type="password" placeholder="Password">
						<label for="password">Password</label>
					</div>
					<div class="d-grid mx-auto">
						<button class="btn btn-primary btn-block fw-bold" type="submit" value="submit">Sign in</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
