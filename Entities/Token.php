<?php namespace MastodonApi\Entities;

/**
 * Class Token
 *
 * @package MastodonApi\Entities
 */
class Token
{
	/**
	 * @var string $access_token
	 */
	public $access_token;

	/**
	 * @var string $token_type
	 */
	public $token_type;

	/**
	 * @var string $scope
	 */
	public $scope;

	/**
	 * @var int $created_at
	 */
	public $created_at;

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
