<?php namespace MastodonApi\Filters;

/**
 * Class PutRequest
 *
 * @package MastodonApi\Filters
 */
class PutRequest
{
	/**
	 * @var string $phrase
	 */
	public $phrase;

	/**
	 * @var array $context home / notifications / public / thread
	 */
	public $context;

	/**
	 * @var string $irreversible
	 */
	public $irreversible;

	/**
	 * @var string $whole_word
	 */
	public $whole_word;

	/**
	 * @var int $expires_in
	 */
	public $expires_in;

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
