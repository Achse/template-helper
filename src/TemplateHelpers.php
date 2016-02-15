<?php

namespace Achse\TemplateHelper;

use Nette\Object;



abstract class TemplateHelpers extends Object
{

	/**
	 * @param string
	 * @return callable|NULL
	 */
	public function loader($name)
	{
		if (method_exists($this, $name)) {
			return function (...$args) use ($name) {
				return $this->{$name}(...$args);
			};
		}

		return NULL;
	}

}
