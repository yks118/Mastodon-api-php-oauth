<?php namespace MastodonApi\Entities;

/**
 * Class Account
 *
 * @package MastodonApi\Entities
 */
class Account
{
	/**
	 * @var string $id
	 */
	public $id;

	/**
	 * @var string $username
	 */
	public $username;

	/**
	 * @var string $acct
	 */
	public $acct;

	/**
	 * @var string $display_name
	 */
	public $display_name;

	/**
	 * @var bool $locked
	 */
	public $locked;

	/**
	 * @var bool $bot
	 */
	public $bot;

	/**
	 * @var string $created_at
	 */
	public $created_at;

	/**
	 * @var string $note
	 */
	public $note;

	/**
	 * @var string $url
	 */
	public $url;

	/**
	 * @var string $avatar
	 */
	public $avatar;

	/**
	 * @var string $avatar_static
	 */
	public $avatar_static;

	/**
	 * @var string $header
	 */
	public $header;

	/**
	 * @var string $header_static
	 */
	public $header_static;

	/**
	 * @var int $followers_count
	 */
	public $followers_count;

	/**
	 * @var int $following_count
	 */
	public $following_count;

	/**
	 * @var int $statuses_count
	 */
	public $statuses_count;

	/**
	 * @var AccountSource $source;
	 */
	public $source;

	/**
	 * @var array $emojis
	 */
	public $emojis;

	/**
	 * @var array $fields
	 */
	public $fields;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'source') $this->source = new AccountSource($value);
			elseif ($key === 'fields')
			{
				foreach ($value as $row)
				{
					$this->fields[] = new AccountField($row);
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
