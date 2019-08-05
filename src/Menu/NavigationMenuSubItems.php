<?php declare(strict_types=1);

namespace SeStep\Navigation\Menu;

use SeStep\Navigation\Menu\Items\INavMenuItem;
use SeStep\Navigation\Menu\Items\NavMenuLink;
use SeStep\Navigation\Menu\Items\NavMenuSeparator;
use UnexpectedValueException;

/** @internal */
trait NavigationMenuSubItems
{
    /** @var INavMenuItem[] */
    protected $items = [];

    public function hasItems(): bool
    {
        return !empty($this->items);
    }

    public function hasItem($name): bool
    {
        return isset($this->items[$name]);
    }

    /** @return INavMenuItem[] */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param INavMenuItem[] $items
     * @return static
     */
    public function setItems(array $items)
    {
        foreach ($items as $item) {
            if (!($item instanceof INavMenuItem)) {
                throw new UnexpectedValueException();
            }
        }
        $this->items = $items;

        return $this;
    }

    public function addLink($target, string $caption = '', string $icon = '', array $parameters = [])
    {
        return $this->items[] = new NavMenuLink($target, $caption, $icon, $parameters);
    }

    public function addSeparator()
    {
        return $this->items[] = new NavMenuSeparator();
    }
}
