<?php

namespace SeStep\Navigation\Menu;

class Label
{
    /** @var string */
	protected $text;
	/** @var string */
	protected $level;

    public function __construct(string $text, string $level = '')
    {
        $this->setText($text);
        $this->setLevel($level);
    }

    public function getText(): string
	{
		return $this->text;
	}

    public function setText(string $text)
	{
	    $this->text = $text;
	}

	public function getLevel(): string
	{
		return $this->level;
	}

	public function setLevel(string $level)
	{
		$this->level = $level;
	}
}
