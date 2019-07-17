<?php namespace MastodonApi\Apps\verifyCredentials;

/**
 * Class Response
 *
 * @package MastodonApi\Apps\verifyCredentials
 */
class Response
{
	/**
	 * @var string $name
	 */
	public $name;

	/**
	 * @var string $website
	 */
	public $website;

	/**
	 * @var string $vapid_key
	 */
	public $vapid_key;

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
