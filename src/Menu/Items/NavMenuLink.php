<?php

namespace SeStep\Navigation\Menu\Items;

/**
 * Class NavMenuLink
 * @package SeStep\Navigation\Menu\Items
 *
 * @property    string $target
 * @property    string $caption
 * @property    string $icon
 * @property    array $parameters
 */
class NavMenuLink extends ANavMenuItem
{
    protected $target;
    protected $caption;
    protected $icon;
    protected $parameters;

    public function __construct($target, $caption = '', $icon = '', $parameters)
    {
        $this->target = $target;
        $this->caption = $caption ?: $target;
        $this->icon = $icon;
        $this->parameters = $parameters;
    }

    public function getRole()
    {
        if ($this->hasItems()) {
            return self::ROLE_DROPDOWN;
        } else {
            return self::ROLE_LINK;
        }
    }

    /** @return string */
    public function getTarget()
    {
        return $this->target;
    }

    /** @param string $target */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /** @return string */
    public function getCaption()
    {
        return $this->caption;
    }

    /** @param string $caption */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /** @return string */
    public function getIcon()
    {
        return $this->icon;
    }

    /** @param string $icon */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /** @return array */
    public function getParameters()
    {
        return $this->parameters;
    }

    /** @param array $parameters */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }
}
