<?php namespace MastodonApi\Lists;

/**
 * Class PostRequest
 *
 * @package MastodonApi\Lists
 */
class PostRequest
{
	/**
	 * @var string $title
	 */
	public $title;

	public function __construct(array $data = [])
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
