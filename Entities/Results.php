<?php namespace MastodonApi\Entities;

/**
 * Class Results
 *
 * @package MastodonApi\Entities
 */
class Results
{
	/**
	 * @var array $accounts
	 */
	public $accounts;

	/**
	 * @var array $statuses
	 */
	public $statuses;

	/**
	 * @var array $hashtags
	 */
	public $hashtags;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'accounts')
			{
				foreach ($value as $row)
				{
					$this->accounts[] = new Account($row);
				}
			}
			elseif ($key === 'statuses')
			{
				foreach ($value as $row)
				{
					$this->statuses[] = new Status($row);
				}
			}
			elseif ($key === 'hashtags')
			{
				foreach ($value as $row)
				{
					$this->hashtags[] = new Tags($row);
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
