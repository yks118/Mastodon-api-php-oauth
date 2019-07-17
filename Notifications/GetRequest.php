<?php namespace MastodonApi\Notifications;

/**
 * Class GetRequest
 *
 * @package MastodonApi\Notifications
 */
class GetRequest
{
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
	 * @var array $exclude_types follow, favourite, reblog, mention
	 */
	public $exclude_types = [];

	/**
	 * @var string $account_id
	 */
	public $account_id;

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
