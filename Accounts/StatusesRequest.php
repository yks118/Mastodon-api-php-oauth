<?php namespace MastodonApi\Accounts;

/**
 * Class StatusesRequest
 *
 * @package MastodonApi\Accounts
 */
class StatusesRequest
{
	/**
	 * @var string $only_media
	 */
	public $only_media = 'false';

	/**
	 * @var string $pinned
	 */
	public $pinned = 'false';

	/**
	 * @var string $exclude_replies
	 */
	public $exclude_replies = 'false';

	/**
	 * @var string $max_id
	 */
	public $max_id;

	/**
	 * @var string $since_id
	 */
	public $since_id;

	/**
	 * @var string $min_id
	 */
	public $min_id;

	/**
	 * @var int $limit
	 */
	public $limit = 20;

	/**
	 * @var string $exclude_reblogs
	 */
	public $exclude_reblogs = 'false';

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
