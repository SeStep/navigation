<?php declare(strict_types=1);

namespace SeStep\Navigation\Menu\Items;

use SeStep\Navigation\Menu\Label;
use SeStep\Navigation\Menu\NavigationMenuSubItems;

abstract class ANavMenuItem implements INavMenuItem
{
    use NavigationMenuSubItems;

    /** @var Label */
    protected $label;

    /** @return Label */
    public function getLabel(): ?Label
    {
        return $this->label;
    }

    /** @param Label $label */
    public function setLabel(Label $label = null)
    {
        $this->label = $label;
    }

    public function addLabel($text, $class)
    {
        $label = new Label($text, $class);
        $this->setLabel($label);
    }


}
