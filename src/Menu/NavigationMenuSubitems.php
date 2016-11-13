<?php

namespace SeStep\Navigation\Menu;

use SeStep\Navigation\Menu\Items\INavMenuItem;
use SeStep\Navigation\Menu\Items\NavMenuLink;
use SeStep\Navigation\Menu\Items\NavMenuSeparator;
use UnexpectedValueException;

/**
 * Class NavigationMenuSubitems
 * @package SeStep\Navigation\Menu
 *
 * @property INavMenuItem[] $items
 */
trait NavigationMenuSubitems
{
    /** @var INavMenuItem[] */
    protected $items = [];

    /**
     * @return bool
     */
    public function hasItems()
    {
        return !empty($this->items);
    }

    /**
     * @return INavMenuItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param INavMenuItem[] $items
     */
    public function setItems($items)
    {
        foreach ($items as $item) {
            if (!($item instanceof INavMenuItem)) {
                throw new UnexpectedValueException();
            }
        }
        $this->items = $items;
    }

    /**
     * @param $target
     * @param $caption
     * @param array $parameters
     * @return NavMenuLink
     */
    public function addLink($target, $caption = '', $icon = '', $parameters = [])
    {
        $item = new NavMenuLink($target, $caption, $icon, $parameters);

        return $this->items[] = $item;
    }

    public function addSeparator()
    {
        return $this->items[] = new NavMenuSeparator();
    }
}
