<?php namespace MastodonApi\Oauth;

/**
 * Class AuthorizeRequest
 *
 * @package MastodonApi\Oauth
 */
class AuthorizeRequest
{
	/**
	 * @var string $response_type
	 */
	public $response_type = 'code';

	/**
	 * @var string $client_id
	 */
	public $client_id;

	/**
	 * @var string $client_secret
	 */
	public $client_secret;

	/**
	 * @var string $redirect_uri
	 */
	public $redirect_uri;

	/**
	 * @var array $scope https://docs.joinmastodon.org/api/permissions/
	 */
	public $scopes = [];

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
