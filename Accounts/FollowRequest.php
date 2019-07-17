<?php namespace MastodonApi\Accounts;

/**
 * Class FollowRequest
 *
 * @package MastodonApi\Accounts
 */
class FollowRequest
{
	/**
	 * @var string $reblogs
	 */
	public $reblogs = 'true';

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
