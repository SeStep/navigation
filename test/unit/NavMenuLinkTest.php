<?php declare(strict_types=1);

namespace Test\SeStep\Navigation\unit;


use PHPUnit\Framework\TestCase;
use SeStep\Navigation\Menu\Items\INavMenuItem;
use SeStep\Navigation\Menu\Items\NavMenuLink;

class NavMenuLinkTest extends TestCase
{
    public function testProperties()
    {
        $link = new NavMenuLink("home", 'Homepage', 'small-house-with-chimney', ['sweet' => 'yes']);

        $this->assertEquals('home', $link->getTarget());
        $this->assertEquals('Homepage', $link->getCaption());
        $this->assertEquals('small-house-with-chimney', $link->getIcon());
        $this->assertEquals(['sweet' => 'yes'], $link->getParameters());
    }

    public function testGetRole()
    {
        $link = new NavMenuLink('garden');

        $this->assertEquals(INavMenuItem::ROLE_LINK, $link->getRole());

        $link->setItems([
            'front' => new NavMenuLink('frontGarden', 'Nice 5 lane garden'),
            'back' => new NavMenuLink('backGarden', '6 lane garden with pool'),
            'roof' => new NavMenuLink('roof', 'We don\'t talk about roof here'),
        ]);

        $this->assertEquals(INavMenuItem::ROLE_DROPDOWN, $link->getRole());
    }
}
