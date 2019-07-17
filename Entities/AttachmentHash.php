<?php namespace MastodonApi\Entities;

/**
 * Class AttachmentHash
 *
 * @package MastodonApi\Entities
 */
class AttachmentHash
{
	/**
	 * @var int $width
	 */
	public $width;

	/**
	 * @var int $height
	 */
	public $height;

	/**
	 * @var string $size
	 */
	public $size;

	/**
	 * @var float $aspect
	 */
	public $aspect;

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
