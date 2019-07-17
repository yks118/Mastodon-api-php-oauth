<?php namespace MastodonApi\Lists;

/**
 * Class PostAccountsRequest
 *
 * @package MastodonApi\Lists
 */
class PostAccountsRequest
{
	/**
	 * @var array $account_ids
	 */
	public $account_ids;

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
