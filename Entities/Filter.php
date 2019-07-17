<?php namespace MastodonApi\Entities;

/**
 * Class Filter
 *
 * @package MastodonApi\Entities
 */
class Filter
{
	/**
	 * @var string $id
	 */
	public $id;

	/**
	 * @var string $phrase
	 */
	public $phrase;

	/**
	 * @var array $context home / notifications / public / thread
	 */
	public $context;

	/**
	 * @var string $expires_at
	 */
	public $expires_at;

	/**
	 * @var bool $irreversible
	 */
	public $irreversible;

	/**
	 * @var bool $whole_word
	 */
	public $whole_word;

	public function __construct(array $data)
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
