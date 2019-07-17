<?php namespace MastodonApi\Entities;

/**
 * Class AccountSource
 *
 * @package MastodonApi\Entities
 */
class AccountSource
{
	/**
	 * @var string $privacy
	 */
	public $privacy;

	/**
	 * @var bool $sensitive
	 */
	public $sensitive;

	/**
	 * @var string $language
	 */
	public $language;

	/**
	 * @var string $note
	 */
	public $note;

	/**
	 * @var array $fields
	 */
	public $fields;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'fields')
			{
				foreach ($value as $row)
				{
					$this->fields[] = new AccountField($row);
				}
			}
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
