<?php namespace MastodonApi\Entities;

/**
 * Class TagsHistory
 *
 * @package MastodonApi\Entities
 */
class TagsHistory
{
	/**
	 * @var string $day
	 */
	public $day;

	/**
	 * @var int $uses
	 */
	public $uses;

	/**
	 * @var int $accounts
	 */
	public $accounts;

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
