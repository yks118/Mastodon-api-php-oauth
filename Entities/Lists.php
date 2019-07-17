<?php namespace MastodonApi\Entities;

/**
 * Class Lists
 *
 * @package MastodonApi\Entities
 */
class Lists
{
	/**
	 * @var string $id
	 */
	public $id;

	/**
	 * @var string $title
	 */
	public $title;

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
