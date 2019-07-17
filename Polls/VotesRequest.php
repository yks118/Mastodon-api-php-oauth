<?php namespace MastodonApi\Polls;

/**
 * Class VotesRequest
 *
 * @package MastodonApi\Polls
 */
class VotesRequest
{
	/**
	 * @var array $choices
	 */
	public $choices;

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
