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

    public function __construct($itemData)
    {
        $this->items = $this->parseItems($itemData);
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
     * @return ANavMenuItem[]
     */
    public static function parseItems($itemsData)
    {
        $items = [];
        foreach ($itemsData as $name => $item) {
            $items[$name] = self::parseItem($item);
        }

        return $items;
    }

    public static function parseItem($data): INavMenuItem
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
                $subItems = self::parseItems($data['subItems']);
                $navMenuLink->setItems($subItems);
            }

            return $navMenuLink;
        }

        throw new \InvalidArgumentException("Unrecognized NavigationMenu item: " . gettype($data));
    }
}
