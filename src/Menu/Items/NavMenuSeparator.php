<?php declare(strict_types=1);

namespace SeStep\Navigation\Menu\Items;

class NavMenuSeparator implements INavMenuItem
{
	public function getRole(): string
	{
		return self::ROLE_SEPARATOR;
	}
}
