<?php namespace MastodonApi\Entities;

/**
 * Class Notification
 *
 * @package MastodonApi\Entities
 */
class Notification
{
	/**
	 * @var string $id
	 */
	public $id;

	/**
	 * @var string $type follow / mention / reblog / favourite
	 */
	public $type;

	/**
	 * @var string $created_at
	 */
	public $created_at;

	/**
	 * @var Account $account
	 */
	public $account;

	/**
	 * @var Status $status
	 */
	public $status;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'account') $this->account = new Account($value);
			elseif ($key === 'status') $this->status = new Status($value);
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
