<?php namespace MastodonApi\Entities;

/**
 * Class Card
 *
 * @package MastodonApi\Entities
 */
class Card
{
	/**
	 * @var string $url
	 */
	public $url;

	/**
	 * @var string $title
	 */
	public $title;

	/**
	 * @var string $description
	 */
	public $description;

	/**
	 * @var string $image
	 */
	public $image;

	/**
	 * @var string $type link / photo / video / rich
	 */
	public $type;

	/**
	 * @var string $author_name
	 */
	public $author_name;

	/**
	 * @var string $author_url
	 */
	public $author_url;

	/**
	 * @var string $provider_name
	 */
	public $provider_name;

	/**
	 * @var string $provider_url
	 */
	public $provider_url;

	/**
	 * @var string $html
	 */
	public $html;

	/**
	 * @var int $width
	 */
	public $width;

	/**
	 * @var int $height
	 */
	public $height;

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
