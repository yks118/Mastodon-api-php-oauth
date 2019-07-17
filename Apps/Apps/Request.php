<?php namespace MastodonApi\Apps\Apps;

/**
 * Class Request
 *
 * @package MastodonApi\Apps\Apps
 */
class Request
{
	/**
	 * @var string $client_name Name of your application
	 */
	public $client_name;

	/**
	 * @var string $redirect_uris Where the user should be redirected after authorization
	 */
	public $redirect_uris;

	/**
	 * @var array $scopes https://docs.joinmastodon.org/api/permissions/
	 */
	public $scopes = [
		'write',
		'read',
		'follow',
		'push'
	];

	/**
	 * @var string $website URL to the homepage of your app
	 */
	public $website;

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
