<?php namespace MastodonApi\Entities;

/**
 * Class Attachment
 *
 * @package MastodonApi\Entities
 */
class Attachment
{
	/**
	 * @var string $id
	 */
	public $id;

	/**
	 * @var string $type unknown / image / gifv / video
	 */
	public $type;

	/**
	 * @var string $url
	 */
	public $url;

	/**
	 * @var string $remote_url
	 */
	public $remote_url;

	/**
	 * @var string $preview_url
	 */
	public $preview_url;

	/**
	 * @var string $text_url
	 */
	public $text_url;

	/**
	 * @var AttachmentHash $meta
	 */
	public $meta;

	/**
	 * @var string $description
	 */
	public $description;

	/**
	 * @var string $blurhash
	 */
	public $blurhash;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'meta' && is_array($value))
			{
				foreach ($value as $item => $row)
				{
					$this->meta[$item] = new AttachmentHash($row);
				}
			}
			else $this->{$key} = $value;
		}
	}

	public function __set($name, $value)
	{
	}

	public function __get($name)
	{
	}
}
