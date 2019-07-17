<?php namespace MastodonApi\Oauth;

/**
 * Class TokenRequest
 *
 * @package MastodonApi\Oauth
 */
class TokenRequest
{
	/**
	 * @var string $grant_type
	 */
	public $grant_type;

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
	public $scopes = [
		'write',
		'read',
		'follow',
		'push'
	];

	/**
	 * @var string $code
	 */
	public $code;

	/**
	 * @var string $username
	 */
	public $username;

	/**
	 * @var string $password
	 */
	public $password;

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
