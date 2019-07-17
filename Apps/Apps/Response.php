<?php namespace MastodonApi\Apps\Apps;

/**
 * Class Response
 *
 * @package MastodonApi\Apps\Apps
 */
class Response
{
	/**
	 * @var string $id
	 */
	public $id;

	/**
	 * @var string $name
	 */
	public $name;

	/**
	 * @var string $website
	 */
	public $website;

	/**
	 * @var string $redirect_uri
	 */
	public $redirect_uri;

	/**
	 * @var string $client_id
	 */
	public $client_id;

	/**
	 * @var string $client_secret
	 */
	public $client_secret;

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
