<?php namespace MastodonApi\Entities;

/**
 * Class ScheduledStatusParams
 *
 * @package MastodonApi\Entities
 */
class ScheduledStatusParams
{
	/**
	 * @var string $text
	 */
	public $text;

	/**
	 * @var string $in_reply_to_id
	 */
	public $in_reply_to_id;

	/**
	 * @var array $media_ids
	 */
	public $media_ids;

	/**
	 * @var bool $sensitive
	 */
	public $sensitive;

	/**
	 * @var string $spoiler_text
	 */
	public $spoiler_text;

	/**
	 * @var string $visibility
	 */
	public $visibility;

	/**
	 * @var string $scheduled_at
	 */
	public $scheduled_at;

	/**
	 * @var string $application_id
	 */
	public $application_id;

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
