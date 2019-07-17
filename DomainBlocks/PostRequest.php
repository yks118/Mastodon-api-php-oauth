<?php namespace MastodonApi\DomainBlocks;

/**
 * Class PostRequest
 *
 * @package MastodonApi\DomainBlocks
 */
class PostRequest
{
	/**
	 * @var string $domain
	 */
	public $domain;

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
