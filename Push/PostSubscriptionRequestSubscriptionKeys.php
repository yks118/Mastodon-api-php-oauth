<?php namespace MastodonApi\Push;

/**
 * Class PostSubscriptionRequestSubscriptionKeys
 *
 * @package MastodonApi\Push
 */
class PostSubscriptionRequestSubscriptionKeys
{
	/**
	 * @var string $p256dh
	 */
	public $p256dh;

	/**
	 * @var string $auth
	 */
	public $auth;

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
