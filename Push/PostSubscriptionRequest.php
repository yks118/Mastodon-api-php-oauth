<?php namespace MastodonApi\Push;

/**
 * Class PostSubscriptionRequest
 *
 * @package MastodonApi\Push
 */
class PostSubscriptionRequest
{
	/**
	 * @var PostSubscriptionRequestSubscription $subscription
	 */
	public $subscription;

	/**
	 * @var PostSubscriptionRequestData $data
	 */
	public $data;

	public function __construct(array $data = [])
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'subscription') $this->subscription = new PostSubscriptionRequestSubscription($value);
			elseif ($key === 'data') $this->data = new PostSubscriptionRequestData($value);
			else $this->{$key} = $value;
		}

		if (is_null($this->subscription))
		{
			$this->subscription = new PostSubscriptionRequestSubscription();
		}

		if (is_null($this->data))
		{
			$this->data = new PostSubscriptionRequestData();
		}
	}

	public function __set($name, $value)
	{
	}

	public function __get($name)
	{
	}
}
