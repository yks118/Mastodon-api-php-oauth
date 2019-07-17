<?php namespace MastodonApi\Entities;

/**
 * Class Relationship
 *
 * @package MastodonApi\Entities
 */
class Relationship
{
	/**
	 * @var string $id
	 */
	public $id;

	/**
	 * @var bool $following
	 */
	public $following;

	/**
	 * @var bool $followed_by
	 */
	public $followed_by;

	/**
	 * @var bool $blocking
	 */
	public $blocking;

	/**
	 * @var bool $blocked_by
	 */
	public $blocked_by;

	/**
	 * @var bool $muting
	 */
	public $muting;

	/**
	 * @var bool $muting_notifications
	 */
	public $muting_notifications;

	/**
	 * @var bool $requested
	 */
	public $requested;

	/**
	 * @var bool $domain_blocking
	 */
	public $domain_blocking;

	/**
	 * @var bool $showing_reblogs
	 */
	public $showing_reblogs;

	/**
	 * @var bool $endorsed
	 */
	public $endorsed;

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
