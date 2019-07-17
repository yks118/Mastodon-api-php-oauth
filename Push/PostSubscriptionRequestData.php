<?php namespace MastodonApi\Push;

/**
 * Class PostSubscriptionRequestData
 *
 * @package MastodonApi\Push
 */
class PostSubscriptionRequestData
{
	/**
	 * @var PostSubscriptionRequestDataAlerts $alerts
	 */
	public $alerts;

	public function __construct(array $data = [])
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'alerts') $this->alerts = new PostSubscriptionRequestDataAlerts($value);
			else $this->{$key} = $value;
		}
	}

	public function __set($name, $value)
	{
	}

	public function __get($name)
	{
	}
}
