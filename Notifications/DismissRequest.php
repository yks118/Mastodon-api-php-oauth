<?php namespace MastodonApi\Notifications;

/**
 * Class DismissRequest
 *
 * @package MastodonApi\Notifications
 */
class DismissRequest
{
	/**
	 * @var string $id
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
