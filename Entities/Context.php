<?php namespace MastodonApi\Entities;

/**
 * Class Context
 *
 * @package MastodonApi\Entities
 */
class Context
{
	/**
	 * @var array $ancestors
	 */
	public $ancestors;

	/**
	 * @var array $descendants
	 */
	public $descendants;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'ancestors')
			{
				foreach ($value as $row)
				{
					$this->ancestors[] = new Status($row);
				}
			}
			elseif ($key === 'descendants')
			{
				foreach ($value as $row)
				{
					$this->descendants[] = new Status($row);
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
