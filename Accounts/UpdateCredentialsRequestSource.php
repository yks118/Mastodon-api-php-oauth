<?php namespace MastodonApi\Accounts;

/**
 * Class UpdateCredentialsRequestSource
 *
 * @package MastodonApi\Accounts
 */
class UpdateCredentialsRequestSource
{
	/**
	 * @var string $privacy Preferences -> Other -> [select box] Posting privacy
	 */
	public $privacy;

	/**
	 * @var string $sensitive Preferences -> Other -> [checkbox] Always mark media as sensitive
	 */
	public $sensitive;

	/**
	 * @var string $language Preferences -> Other -> [select box] Posting language
	 */
	public $language;

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
