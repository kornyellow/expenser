<?php

namespace libraries\expenser\methods;

use libraries\korn\server\query\KornQuery;
use libraries\expenser\classes\EPInstance;

abstract class EPMethod {
	abstract public static function browse(string $query, int $limit = 15, int $offset = 0): array;
	abstract public static function get(int $id): EPInstance|null;
	abstract public static function getAll(): array;

	abstract public static function add(EPInstance $instance): int;
	abstract public static function update(EPInstance $instance): void;
	abstract public static function remove(EPInstance $instance): void;

	abstract protected static function processObject(KornQuery $query, bool $isArray = false): EPInstance|array|null;
}
