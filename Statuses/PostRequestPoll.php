<?php namespace MastodonApi\Statuses;

/**
 * Class PostRequestPoll
 *
 * @package MastodonApi\Statuses
 */
class PostRequestPoll
{
	/**
	 * @var array $options
	 */
	public $options;

	/**
	 * @var int $expires_in
	 */
	public $expires_in;

	/**
	 * @var string $multiple
	 */
	public $multiple = 'false';

	/**
	 * @var string $hide_totals
	 */
	public $hide_totals = 'false';

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
