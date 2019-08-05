<?php declare(strict_types=1);

namespace SeStep\Navigation\Menu\Items;

interface INavMenuItem
{
    const ROLE_LINK = 'link';
    const ROLE_SEPARATOR = 'separator';
    const ROLE_DROPDOWN = 'dropdown';

    public function getRole(): string;
}
