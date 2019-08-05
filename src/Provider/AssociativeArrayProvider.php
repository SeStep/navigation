<?php declare(strict_types=1);

namespace SeStep\Navigation\Provider;


use SeStep\Navigation\Menu\Items\ANavMenuItem;
use SeStep\Navigation\Menu\Items\INavMenuItem;
use SeStep\Navigation\Menu\Items\NavMenuLink;
use SeStep\Navigation\Menu\Items\NavMenuSeparator;

class AssociativeArrayProvider implements NavigationItemsProvider, \IteratorAggregate
{

    /** @var INavMenuItem[] */
    private $items;

    /**
     * AssociativeArrayProvider constructor.
     * @param $itemData
     * @param callable $itemFilter
     */
    public function __construct($itemData, callable $itemFilter = null)
    {
        $this->items = $this->parseItems($itemData, $itemFilter);
    }


    /** @inheritDoc */
    public function getItems()
    {
        return $this->items;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    /**
     * @param array
     * @param callable $itemFilter
     *
     * @return ANavMenuItem[]
     */
    public static function parseItems($itemsData, callable $itemFilter = null)
    {
        if($itemFilter && !is_callable($itemFilter)) {
            throw new \InvalidArgumentException("Parameter itemFilter must be a callable");
        }

        $items = [];
        foreach ($itemsData as $name => $item) {
            if ($itemFilter && !call_user_func($itemFilter, $item)) {
                continue;
            }

            $items[$name] = self::parseItem($item, $itemFilter);
        }

        return $items;
    }

    public static function parseItem($data, callable $subItemsFilter = null): INavMenuItem
    {
        if (is_string($data)) {
            if ($data == '|') {
                return new NavMenuSeparator();
            }
        }

        if (is_array($data)) {
            $target = $data['target'] ?? '';
            $caption = $data['caption'] ?? '';
            $icon = $data['icon'] ?? null;
            $params = $data['parameters'] ?? [];

            $navMenuLink = new NavMenuLink($target, $caption, $icon, $params);
            if (isset($data['subItems'])) {
                $subItems = self::parseItems($data['subItems'], $subItemsFilter);
                $navMenuLink->setItems($subItems);
            }

            return $navMenuLink;
        }

        throw new \InvalidArgumentException("Unrecognized NavigationMenu item: " . gettype($data));
    }
}
