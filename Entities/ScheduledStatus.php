<?php namespace MastodonApi\Entities;

/**
 * Class ScheduledStatus
 *
 * @package MastodonApi\Entities
 */
class ScheduledStatus
{
	/**
	 * @var string $id
	 */
	public $id;

	/**
	 * @var string $scheduled_at
	 */
	public $scheduled_at;

	/**
	 * @var ScheduledStatusParams $params
	 */
	public $params;

	/**
	 * @var array $media_attachments
	 */
	public $media_attachments;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'params') $this->params = new ScheduledStatusParams($value);
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
