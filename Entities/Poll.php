<?php namespace MastodonApi\Entities;

/**
 * Class Poll
 *
 * @package MastodonApi\Entities
 */
class Poll
{
	/**
	 * @var string $id
	 */
	public $id;

	/**
	 * @var string $expires_at
	 */
	public $expires_at;

	/**
	 * @var bool $expired
	 */
	public $expired;

	/**
	 * @var bool $multiple
	 */
	public $multiple;

	/**
	 * @var int $votes_count
	 */
	public $votes_count;

	/**
	 * @var array $options
	 */
	public $options;

	/**
	 * @var bool $voted
	 */
	public $voted;

	/**
	 * @var array $emojis
	 */
	public $emojis;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'options')
			{
				foreach ($value as $row)
				{
					$this->options[] = new PollOption($row);
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
