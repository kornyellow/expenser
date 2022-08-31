<?php

namespace libraries\expenser\methods\authentication;

use libraries\expenser\methods\EPMethod;
use libraries\korn\server\query\KornQuery;
use libraries\expenser\classes\EPInstance;
use libraries\korn\server\query\KornStatement;
use libraries\expenser\classes\authentication\UserToken;
use libraries\korn\server\query\builder\KornQuerySelect;
use libraries\korn\server\query\builder\KornQueryReplace;

class EPUserToken extends EPMethod {
	private static string $tableName = 'user_token';

	public static function add(UserToken|EPInstance $instance): int {
		$values  = [
			'utk_id'      => $instance->getId(),
			'utk_user_id' => $instance->getUser()->getId(),
			'utk_token'   => $instance->getToken(),
		];
		$replace = new KornQueryReplace(self::$tableName);
		$replace->values($values);

		$query = new KornQuery($replace);

		return $query->insertedID();
	}
	public static function browse(string $query, int $limit = 15, int $offset = 0): array {
		return [];
	}
	public static function get(int $id): UserToken|EPInstance|null {
		$select = new KornQuerySelect(self::$tableName);
		$select->where('utk_id', $id);

		return self::processObject(new KornQuery($select));
	}
	public static function getByToken(string $token): UserToken|null {
		$select = new KornQuerySelect(self::$tableName);
		$select->where('utk_token', $token);

		return self::processObject(new KornQuery($select));
	}
	public static function getAll(): array {
		return [];
	}
	protected static function processObject(KornQuery $query, bool $isArray = false): UserToken|EPInstance|array|null {
		$result = [];

		$bind = KornStatement::getEmptyFieldsName(self::$tableName);
		while ($bind = $query->nextBind($bind)) {
			$result[] = new UserToken(
				$bind['utk_id'],
				EPUser::get($bind['utk_user_id']),
				$bind['utk_token'],
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
}
