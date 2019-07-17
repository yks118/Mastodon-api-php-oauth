<?php namespace MastodonApi\Accounts;

/**
 * Class SearchRequest
 *
 * @package MastodonApi\Accounts
 */
class SearchRequest
{
	/**
	 * @var string $q
	 */
	public $q;

	/**
	 * @var int $limit
	 */
	public $limit = 40;

	/**
	 * @var string $resolve
	 */
	public $resolve = 'false';

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
