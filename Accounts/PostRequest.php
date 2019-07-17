<?php namespace MastodonApi\Accounts;

/**
 * Class PostRequest
 *
 * @package MastodonApi\Accounts
 */
class PostRequest
{
	/**
	 * @var string $username
	 */
	public $username;

	/**
	 * @var string $email
	 */
	public $email;

	/**
	 * @var string $password
	 */
	public $password;

	/**
	 * @var bool $agreement
	 */
	public $agreement;

	/**
	 * @var string $locale
	 */
	public $locale;

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
