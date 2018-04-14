<?php

namespace Achse\TemplateHelper;

abstract class TemplateHelpers
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

        return null;
    }

}
