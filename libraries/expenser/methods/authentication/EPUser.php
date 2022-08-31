<?php

namespace libraries\expenser\methods\authentication;

use libraries\expenser\methods\EPMethod;
use libraries\korn\server\query\KornQuery;
use libraries\expenser\classes\EPInstance;
use libraries\korn\server\query\KornStatement;
use libraries\expenser\classes\authentication\User;
use libraries\korn\server\query\builder\KornQuerySelect;
use libraries\korn\server\query\builder\KornQueryReplace;

class EPUser extends EPMethod {
	private static string $tableName = 'user';
	private static User|null $signedIn = null;

	public static function add(User|EPInstance $instance): int {
		$values  = [
			'u_id'             => $instance->getId(),
			'u_email_address'  => $instance->getEmailAddress(),
			'u_password'       => $instance->getPassword(),
			'u_name_firstname' => $instance->getNameFirstname(),
			'u_name_lastname'  => $instance->getNameLastname(),
			'u_name_nickname'  => $instance->getNameNickname(),
		];
		$replace = new KornQueryReplace(self::$tableName);
		$replace->values($values);

		$query = new KornQuery($replace);

		return $query->insertedID();
	}
	public static function browse(string $query, int $limit = 15, int $offset = 0): array {
		// TODO: Implement browse() method.
		return [];
	}
	public static function get(int $id): User|EPInstance|null {
		$select = new KornQuerySelect(self::$tableName);
		$select->where('u_id', $id);

		return self::processObject(new KornQuery($select));
	}
	public static function getAll(): array {
		$select = new KornQuerySelect(self::$tableName);

		return self::processObject(new KornQuery($select), true);
	}
	public static function getSignedIn(): User|null {
		return self::$signedIn;
	}
	public static function setSignedIn(User $user): void {
		self::$signedIn = $user;
	}
	protected static function processObject(KornQuery $query, bool $isArray = false): User|EPInstance|array|null {
		$result = [];

		$bind = KornStatement::getEmptyFieldsName(self::$tableName);
		while ($bind = $query->nextBind($bind)) {
			$result[] = new User(
				$bind['u_id'],
				$bind['u_email_address'],
				$bind['u_password'],
				$bind['u_name_firstname'],
				$bind['u_name_lastname'],
				$bind['u_name_nickname'],
			);
			if (!$isArray) {
				return $result[0];
			}
		}

		if (count($result) == 0) {
			return null;
		}

		return $result;
	}
	public static function remove(EPInstance $instance): void {
		// TODO: Implement remove() method.
	}
	public static function update(EPInstance $instance): void {
		// TODO: Implement update() method.
	}
	public static function getByEmailAddress(string $emailAddress): User|null {
		$select = new KornQuerySelect(self::$tableName);
		$select->where('u_email_address', $emailAddress);

		return self::processObject(new KornQuery($select));
	}
	public static function verify(string $emailAddress, string $password): bool {
		$user = self::getByEmailAddress($emailAddress);

		if (is_null($user)) {
			return false;
		}

		return password_verify($password, $user->getPassword());
	}
}
