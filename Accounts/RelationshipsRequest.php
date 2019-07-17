<?php namespace MastodonApi\Accounts;

/**
 * Class RelationshipsRequest
 *
 * @package MastodonApi\Accounts
 */
class RelationshipsRequest
{
	/**
	 * @var array $id
	 */
	public $id;

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
