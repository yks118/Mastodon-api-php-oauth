<?php namespace MastodonApi\Accounts;

/**
 * Class UpdateCredentialsRequestFieldsAttributes
 *
 * @package MastodonApi\Accounts
 */
class UpdateCredentialsRequestFieldsAttributes
{
	/**
	 * @var string $name
	 */
	public $name;

	/**
	 * @var string $value
	 */
	public $value;

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
