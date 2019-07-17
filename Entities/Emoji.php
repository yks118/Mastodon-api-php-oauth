<?php namespace MastodonApi\Entities;

/**
 * Class Emoji
 *
 * @package MastodonApi\Entities
 */
class Emoji
{
	/**
	 * @var string $shortcode
	 */
	public $shortcode;

	/**
	 * @var string $static_url
	 */
	public $static_url;

	/**
	 * @var string $url
	 */
	public $url;

	/**
	 * @var bool $visible_in_picker
	 */
	public $visible_in_picker;

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
