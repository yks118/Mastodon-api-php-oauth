<?php namespace MastodonApi\Push;

/**
 * Class PostSubscriptionRequestSubscription
 *
 * @package MastodonApi\Push
 */
class PostSubscriptionRequestSubscription
{
	/**
	 * @var string $endpoint
	 */
	public $endpoint;

	/**
	 * @var PostSubscriptionRequestSubscriptionKeys $keys
	 */
	public $keys;

	public function __construct(array $data = [])
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'keys') $this->keys = new PostSubscriptionRequestSubscriptionKeys($value);
			else $this->{$key} = $value;
		}

		if (is_null($this->keys))
		{
			$this->keys = new PostSubscriptionRequestSubscriptionKeys();
		}
	}

	public function __set($name, $value)
	{
	}

	public function __get($name)
	{
	}
}
