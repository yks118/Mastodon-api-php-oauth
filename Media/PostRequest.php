<?php namespace MastodonApi\Media;

use CURLFile;

/**
 * Class PostRequest
 *
 * @package MastodonApi\Media
 */
class PostRequest
{
	/**
	 * @var CURLFile $file
	 */
	public $file;

	/**
	 * @var string $description max 420 chars
	 */
	public $description;

	/**
	 * @var string $focus
	 */
	public $focus;

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
