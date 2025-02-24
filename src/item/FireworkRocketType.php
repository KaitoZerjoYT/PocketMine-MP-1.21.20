<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
 */

declare(strict_types=1);

namespace pocketmine\item;

use pocketmine\utils\LegacyEnumShimTrait;
use pocketmine\world\sound\FireworkExplosionSound;
use pocketmine\world\sound\FireworkLargeExplosionSound;
use pocketmine\world\sound\Sound;
use function spl_object_id;

enum FireworkRocketType{
	use LegacyEnumShimTrait;

	case SMALL_BALL;
	case LARGE_BALL;
	case STAR;
	case CREEPER;
	case BURST;

	public function getSound() : Sound{
		/** @phpstan-var array<int, Sound> $cache */
		static $cache = [];

		return $cache[spl_object_id($this)] ??= match($this){
			self::SMALL_BALL => new FireworkExplosionSound(),
			self::LARGE_BALL => new FireworkLargeExplosionSound(),
			self::STAR => new FireworkExplosionSound(),
			self::CREEPER => new FireworkExplosionSound(),
			self::BURST => new FireworkExplosionSound(),
		};
	}
}
