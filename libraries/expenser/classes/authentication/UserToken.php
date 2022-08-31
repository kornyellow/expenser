<?php

namespace libraries\expenser\classes\authentication;

use libraries\expenser\classes\EPInstance;

class UserToken extends EPInstance {
	private int    $id;
	private User   $user;
	private string $token;

	function __construct(
		int    $id,
		User   $user,
		string $token,
	) {
		$this->id    = ($id < 0) ? 0 : $id;
		$this->user  = $user;
		$this->token = $token;
	}

	public function getId(): int {
		return $this->id;
	}
	public function setId(int $id): UserToken {
		$this->id = $id;

		return $this;
	}
	public function getUser(): User {
		return $this->user;
	}
	public function setUser(User $user): UserToken {
		$this->user = $user;

		return $this;
	}
	public function getToken(): string {
		return $this->token;
	}
	public function setToken(string $token): UserToken {
		$this->token = $token;

		return $this;
	}
}
