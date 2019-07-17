<?php namespace MastodonApi\Push;

/**
 * Class PutSubscriptionRequestDataAlerts
 *
 * @package MastodonApi\Push
 */
class PutSubscriptionRequestDataAlerts
{
	/**
	 * @var string $follow
	 */
	public $follow;

	/**
	 * @var string $favourite
	 */
	public $favourite;

	/**
	 * @var string $reblog
	 */
	public $reblog;

	/**
	 * @var string $mention
	 */
	public $mention;

	/**
	 * @var string $poll
	 */
	public $poll;

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
