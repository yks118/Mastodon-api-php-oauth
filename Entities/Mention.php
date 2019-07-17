<?php namespace MastodonApi\Entities;

/**
 * Class Mention
 *
 * @package MastodonApi\Entities
 */
class Mention
{
	/**
	 * @var string $url
	 */
	public $url;

	/**
	 * @var string $username
	 */
	public $username;

	/**
	 * @var string $acct
	 */
	public $acct;

	/**
	 * @var string $id
	 */
	public $id;

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
