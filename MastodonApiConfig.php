<?php namespace MastodonApi;

/**
 * Class MastodonApiConfig
 *
 * @package MastodonApi
 */
class MastodonApiConfig
{
	/**
	 * @var string $url
	 */
	private $url = '';

	/**
	 * @var string $client_id
	 */
	private $client_id;

	/**
	 * @var string $client_secret
	 */
	private $client_secret;

	/**
	 * @var string $redirect_uri
	 */
	private $redirect_uri;

	/**
	 * @var array $scopes
	 */
	private $scopes = [
		'write',
		'read',
		'follow',
		'push'
	];

	/**
	 * @var string $access_token
	 */
	private $access_token;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			$this->{$key} = $value;
		}

		if ($this->url) $this->url = rtrim($this->url, '/') . '/';
	}

	public function __set($name, $value)
	{
	}

	public function __get($name)
	{
	}

	public function getData(): array
	{
		return [
			'client_id'     => $this->client_id,
			'client_secret' => $this->client_secret,
			'redirect_uri'  => $this->redirect_uri,
			'scopes'        => $this->scopes
		];
	}

	public function url(): string
	{
		return $this->url;
	}

	public function clientId(): string
	{
		return $this->client_id;
	}

	public function clientSecret(): string
	{
		return $this->client_secret;
	}

	public function redirectUri(): string
	{
		return $this->redirect_uri;
	}

	public function scopes(): array
	{
		return $this->scopes;
	}

	public function authorization(): string
	{
		return 'Authorization: Bearer ' . $this->access_token;
	}
}
