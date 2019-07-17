<?php namespace MastodonApi\Entities;

/**
 * Class InstanceUrls
 *
 * @package MastodonApi\Entities
 */
class InstanceUrls
{
	/**
	 * @var string $streaming_api
	 */
	public $streaming_api;

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
