<?php namespace MastodonApi\Entities;

/**
 * Class Tags
 *
 * @package MastodonApi\Entities
 */
class Tags
{
	/**
	 * @var string $name
	 */
	public $name;

	/**
	 * @var string $url
	 */
	public $url;

	public $history;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'history')
			{
				foreach ($value as $row)
				{
					$this->history = new TagsHistory($row);
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
