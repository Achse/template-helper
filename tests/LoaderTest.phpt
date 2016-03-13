<?php

namespace Achse\TemplateHelper\Test;

require_once __DIR__ . '/bootstrap.php';

use Achse\TemplateHelper\TemplateHelpers;
use Closure;
use Tester\Assert;
use Tester\TestCase;



class DummyHelpers extends TemplateHelpers
{

	/**
	 * @param string $bar
	 * @return string
	 */
	public function getFoo($bar)
	{
		return 'foo' . $bar;
	}

}



class LoaderTest extends TestCase
{

	public function testLoaderOld()
	{
		$helpers = new DummyHelpers();
		/** @var Closure $callback */
		$callback = call_user_func(callback($helpers, 'loader'), 'getFoo');
		Assert::equal('fooBar', $callback('Bar'));
	}



	public function testLoaderNew()
	{
		$helpers = new DummyHelpers();
		$callback = $helpers->loader('getFoo');
		Assert::equal('fooBar', $callback('Bar'));
	}

}



(new LoaderTest())->run();
