<?php

namespace libraries\expenser\classes\authentication;

use libraries\expenser\classes\EPInstance;

class User extends EPInstance {
	private int         $id;
	private string      $emailAddress;
	private string      $password;
	private string|null $nameFirstname;
	private string|null $nameLastname;
	private string|null $nameNickname;

	function __construct(
		int         $id,
		string      $emailAddress,
		string      $password,
		string|null $nameFirstname,
		string|null $nameLastname,
		string|null $nameNickname,
	) {
		$this->id            = ($id < 0) ? 0 : $id;
		$this->emailAddress  = $emailAddress;
		$this->password      = $password;
		$this->nameFirstname = $nameFirstname;
		$this->nameLastname  = $nameLastname;
		$this->nameNickname  = $nameNickname;
	}

	public function getId(): int {
		return $this->id;
	}
	public function setId(int $id): User {
		$this->id = $id;

		return $this;
	}
	public function getEmailAddress(): string {
		return $this->emailAddress;
	}
	public function setEmailAddress(string $emailAddress): User {
		$this->emailAddress = $emailAddress;

		return $this;
	}
	public function getPassword(): string {
		return $this->password;
	}
	public function setPassword(string $password): User {
		$this->password = $password;

		return $this;
	}
	public function getNameFirstname(): string|null {
		return $this->nameFirstname;
	}
	public function setNameFirstname(string $nameFirstname): User {
		$this->nameFirstname = $nameFirstname;

		return $this;
	}
	public function getNameLastname(): string|null {
		return $this->nameLastname;
	}
	public function setNameLastname(string $nameLastname): User {
		$this->nameLastname  = $nameLastname;

		return $this;
	}
	public function getNameNickname(): string|null {
		return $this->nameNickname;
	}
	public function setNameNickname(string $nameNickname): User {
		$this->nameNickname = $nameNickname;

		return $this;
	}
}
