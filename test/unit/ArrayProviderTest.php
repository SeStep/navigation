<?php declare(strict_types=1);

namespace Test\SeStep\Navigation\unit;


use PHPUnit\Framework\TestCase;
use SeStep\Navigation\Menu\Items\NavMenuLink;
use SeStep\Navigation\Provider\AssociativeArrayProvider;

class ArrayProviderTest extends TestCase
{
    public function testLoadFlatMenu()
    {
        $provider = new AssociativeArrayProvider([
            'hall' => [
                'target' => 'room/hall',
                'caption' => 'Hallway',
            ],
            'bathroom' => [
                'target' => 'room/bathroom',
                'icon' => 'clean-sink',
                'parameters' => ['key' => 'FAB']
            ],
        ]);

        $items = $provider->getItems();

        $this->assertCount(2, $items);

        $this->assertEquals(new NavMenuLink('room/hall', 'Hallway'), $items['hall']);
        $this->assertEquals(new NavMenuLink('room/bathroom', '', 'clean-sink', ['key' => 'FAB']), $items['bathroom']);
    }

    public function testLoadNestedMenu()
    {
        $provider = new AssociativeArrayProvider([
            'basement' => [
                'caption' => 'Basement',
                'subItems' => [
                    'cell1' => [
                        'target' => 'cell/1'
                    ],
                    'cell2' => [
                        'target' => 'cell/2'
                    ]
                ]
            ]
        ]);

        $items = $provider->getItems();

        $this->assertArrayHasKey('basement', $items);

        $this->assertCount(2, $items['basement']->getItems());
    }
}
