<?php

namespace SeStep\Navigation\Menu\Items;

use SeStep\Navigation\Bootstrap3\BootstrapLevels;
use SeStep\Navigation\Bootstrap3\Label;
use SeStep\Navigation\Menu\NavigationMenuSubitems;


/**
 * Class ANavMenuItem
 * @package SeStep\Navigation\Menu\Items
 *
 * @property        Label $label
 */
abstract class ANavMenuItem implements INavMenuItem
{
    use NavigationMenuSubitems;

    /** @var Label */
    protected $label;

    /** @return Label */
    public function getLabel()
    {
        return $this->label;
    }

    /** @param Label $label */
    public function setLabel(Label $label)
    {
        $this->label = $label;
    }

    public function addLabel($text, $level = BootstrapLevels::LEVEL_DEFAULT)
    {
        $label = new Label($text, $level);
        $this->setLabel($label);
    }


}
