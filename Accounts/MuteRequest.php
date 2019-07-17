<?php namespace MastodonApi\Accounts;

/**
 * Class MuteRequest
 *
 * @package MastodonApi\Accounts
 */
class MuteRequest
{
	/**
	 * @var string $notifications
	 */
	public $notifications = 'true';

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
