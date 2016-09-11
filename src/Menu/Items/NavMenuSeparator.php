<?php

namespace SeStep\Navigation\Menu\Items;

/**
 * Class NavMenuSeparator
 * @package SeStep\Navigation\Menu\Items
 */
class NavMenuSeparator implements INavMenuItem
{
	public function getRole()
	{
		return self::ROLE_SEPARATOR;
	}
}
