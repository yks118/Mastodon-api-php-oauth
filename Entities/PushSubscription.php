<?php namespace MastodonApi\Entities;

/**
 * Class PushSubscription
 *
 * @package MastodonApi\Entities
 */
class PushSubscription
{
	/**
	 * @var string $id
	 */
	public $id;

	/**
	 * @var string $endpoint
	 */
	public $endpoint;

	/**
	 * @var string $server_key
	 */
	public $server_key;

	/**
	 * @var $alerts
	 */
	public $alerts;

	public function __construct(array $data)
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
