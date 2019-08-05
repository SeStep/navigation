<?php declare(strict_types=1);

namespace SeStep\Navigation\Menu\Items;

class NavMenuLink extends ANavMenuItem
{
    /** @var string */
    protected $target;
    /** @var string */
    protected $caption;
    /** @var string */
    protected $icon;
    /** @var array */
    protected $parameters;

    public function __construct(string $target, string $caption = '', string $icon = null, array $parameters = [])
    {
        $this->target = $target;
        $this->caption = $caption ?: $target;
        $this->icon = $icon;
        $this->parameters = $parameters;
    }

    public function getRole(): string
    {
        if ($this->hasItems()) {
            return self::ROLE_DROPDOWN;
        } else {
            return self::ROLE_LINK;
        }
    }

    public function getTarget(): string
    {
        return $this->target;
    }

    public function setTarget(string $target)
    {
        $this->target = $target;
    }

    public function getCaption(): string
    {
        return $this->caption;
    }

    public function setCaption(string $caption)
    {
        $this->caption = $caption;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon)
    {
        $this->icon = $icon;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }
}
