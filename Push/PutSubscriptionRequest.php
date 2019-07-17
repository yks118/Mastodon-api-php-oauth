<?php namespace MastodonApi\Push;

/**
 * Class PutSubscriptionRequest
 *
 * @package MastodonApi\Push
 */
class PutSubscriptionRequest
{
	/**
	 * @var PutSubscriptionRequestData $data
	 */
	public $data;

	public function __construct(array $data = [])
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'data') $this->data = new PutSubscriptionRequestData($value);
			else $this->{$key} = $value;
		}

		if (is_null($this->data))
		{
			$this->data = new PutSubscriptionRequestData();
		}
	}

	public function __set($name, $value)
	{
	}

	public function __get($name)
	{
	}
}
