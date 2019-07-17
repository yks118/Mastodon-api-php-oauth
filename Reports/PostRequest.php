<?php namespace MastodonApi\Reports;

/**
 * Class PostRequest
 *
 * @package MastodonApi\Reports
 */
class PostRequest
{
	/**
	 * @var string $account_id
	 */
	public $account_id;

	/**
	 * @var string $status_ids
	 */
	public $status_ids;

	/**
	 * @var string $comment
	 */
	public $comment;

	/**
	 * @var string $forward
	 */
	public $forward;

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
