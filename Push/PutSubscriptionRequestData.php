<?php namespace MastodonApi\Push;

/**
 * Class PutSubscriptionRequestData
 *
 * @package MastodonApi\Push
 */
class PutSubscriptionRequestData
{
	/**
	 * @var PutSubscriptionRequestDataAlerts $alerts
	 */
	public $alerts;

	public function __construct(array $data = [])
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'alerts') $this->alerts = new PutSubscriptionRequestDataAlerts($value);
			else $this->{$key} = $value;
		}

		if (is_null($this->alerts))
		{
			$this->alerts = new PutSubscriptionRequestDataAlerts();
		}
	}

	public function __set($name, $value)
	{
	}

	public function __get($name)
	{
	}
}
