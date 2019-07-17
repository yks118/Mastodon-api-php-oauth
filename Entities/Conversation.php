<?php namespace MastodonApi\Entities;

/**
 * Class Conversation
 *
 * @package MastodonApi\Entities
 */
class Conversation
{
	/**
	 * @var string $id
	 */
	public $id;

	/**
	 * @var array $accounts
	 */
	public $accounts;

	/**
	 * @var Status $last_status
	 */
	public $last_status;

	/**
	 * @var bool $unread
	 */
	public $unread;

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
			elseif ($key === 'last_status') $this->last_status = new Status($value);
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
