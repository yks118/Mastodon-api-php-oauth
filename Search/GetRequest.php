<?php namespace MastodonApi\Search;

/**
 * Class GetRequest
 *
 * @package MastodonApi\Search
 */
class GetRequest
{
	/**
	 * @var string $q
	 */
	public $q;

	/**
	 * @var string $resolve
	 */
	public $resolve = 'false';

	/**
	 * @var int $limit
	 */
	public $limit = 40;

	/**
	 * @var int $offset
	 */
	public $offset = 0;

	/**
	 * @var string $following
	 */
	public $following = 'false';

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
