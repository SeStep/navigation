<?php declare(strict_types=1);

namespace SeStep\Navigation\Provider;

use SeStep\Navigation\Menu\Items\ANavMenuItem;

interface NavigationItemsProvider
{
    /**
     * @return ANavMenuItem[]|\Traversable
     */
    public function getItems();
}
