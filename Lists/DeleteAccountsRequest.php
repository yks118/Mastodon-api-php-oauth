<?php namespace MastodonApi\Lists;

/**
 * Class DeleteAccountsRequest
 *
 * @package MastodonApi\Lists
 */
class DeleteAccountsRequest
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
