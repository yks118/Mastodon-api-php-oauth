<?php namespace MastodonApi\Entities;

/**
 * Class Application
 *
 * @package MastodonApi\Entities
 */
class Application
{
	/**
	 * @var string $name
	 */
	public $name;

	/**
	 * @var string $website
	 */
	public $website;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			$this->{$key} = $value;
		}
	}

	public function __set($name, $value)
	{
	}

	public function __get($name)
	{
	}
}
