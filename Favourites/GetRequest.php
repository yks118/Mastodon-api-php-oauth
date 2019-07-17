<?php namespace MastodonApi\Favourites;

/**
 * Class GetRequest
 *
 * @package MastodonApi\Favourites
 */
class GetRequest
{
	/**
	 * @var int $limit
	 */
	public $limit = 20;

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
