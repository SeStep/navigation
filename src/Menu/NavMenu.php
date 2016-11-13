<?php

namespace SeStep\Navigation\Menu;


class NavMenu
{
    use NavigationMenuSubitems;

    private $title;

    public function __construct($title = '')
    {
        $this->title = $title;
    }

    /** @return string */
    public function getTitle()
    {
        return $this->title;
    }

    /** @param string $title */
    public function setTitle($title)
    {
        $this->title = $title;
    }

}
