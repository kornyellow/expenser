<?php

namespace templates\authentication;

use libraries\korn\utils\KornString;
use libraries\korn\client\KornHeader;
use libraries\korn\client\KornCookie;
use libraries\korn\client\KornRequest;
use libraries\expenser\methods\authentication\EPUser;
use libraries\expenser\classes\authentication\UserToken;
use libraries\expenser\methods\authentication\EPUserToken;

KornHeader::constructHeader("Sign in");

$is_submit = KornRequest::post('submit')->isValid();
$result    = -1;
if ($is_submit) {
	$email_address_request = KornRequest::post('email_address');
	$password_request      = KornRequest::post('password');
	if ($email_address_request->isNull() || $password_request->isNull()) {
		$result = 2;
	}
	else if (!EPUser::verify($email_address_request->toString(), $password_request->toString())) {
		$result = 1;
	}
	else {
		// Generate Token
		$user = EPUser::getByEmailAddress($email_address_request->toString());
		do {
			$token = KornString::generateRandomString(32);
		} while (!is_null(EPUserToken::getByToken($token)));

		$userToken = new UserToken(0, $user, $token);
		EPUserToken::add($userToken);

		// Set Token in Cookie
		KornCookie::set('sessionToken', $token);
	}
}

function printResult($result): void {
	switch ($result) {
		case 0:
			echo '
				<div class="alert alert-success alert-dismissible" role="alert">
					<div>User verified</div>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				';
			break;
		case 1:
			echo '
				<div class="alert alert-danger alert-dismissible" role="alert">
					<div>Email address or password is incorrect</div>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				';
			break;
		case 2:
			echo '
				<div class="alert alert-danger alert-dismissible" role="alert">
					<div>An error occurred, please try again</div>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				';
			break;
	}
}


?>

<main class="container mt-5">
	<article>
		<div class="my-4 text-center">
			<h1 class="display-4">Expenser</h1>
			<p>Your expense tracking website.</p>
		</div>
		<?php printResult($result) ?>
		<div class="card">
			<h2 class="card-header text-center text-bg-primary">Sign in</h2>
			<div class="card-body">
				<form action="#" method="post">
					<div class="form-floating mb-3">
						<input required id="email_address" name="email_address" class="form-control" type="email" placeholder="Email address">
						<label for="email_address">Email address</label>
					</div>
					<div class="form-floating mb-3">
						<input required id="password" name="password" minlength="8" class="form-control" type="password" placeholder="Password">
						<label for="password">Password</label>
					</div>
					<div class="form-check mb-3">
						<input class="form-check-input" type="checkbox" name="remember" id="remember">
						<label class="form-check-label" for="remember">Remember password</label>
					</div>
					<div class="d-grid mx-auto">
						<button name="submit" class="btn btn-primary btn-block fw-bold" type="submit">Sign in</button>
					</div>
				</form>
				<p class="card-text mt-3">Not yet a member? <a href="/signup">Sign up now</a></p>
			</div>
		</div>
	</article>
</main>
