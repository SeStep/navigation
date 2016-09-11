<?php

namespace SeStep\Navigation\Bootstrap3;

use Nette\Object;

/**
 * Class Label
 * @package SeStep\Navigation\Bootstrap3
 *
 * @property    string $text
 * @property    string $level
 */
class Label extends Object
{
	protected $text;
	protected $level;

    public function __construct($text = '', $level = '')
    {
        $this->setText($text);
        $this->setLevel($level);
    }

    /** @return string */
	public function getText()
	{
		return $this->text;
	}

	/** @param string $text */
	public function setText($text)
	{
	    $this->text = $text;
	}

	/** @return string */
	public function getLevel()
	{
		return $this->level;
	}

	/** @param string $level */
	public function setLevel($level)
	{
		$this->level = $level;
	}


}
