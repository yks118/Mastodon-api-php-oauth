<?php namespace MastodonApi\Entities;

/**
 * Class InstanceStats
 *
 * @package MastodonApi\Entities
 */
class InstanceStats
{
	/**
	 * @var int $user_count
	 */
	public $user_count;

	/**
	 * @var int $status_count
	 */
	public $status_count;

	/**
	 * @var int $domain_count
	 */
	public $domain_count;

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
