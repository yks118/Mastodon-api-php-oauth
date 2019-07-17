<?php namespace MastodonApi\Accounts;

use CURLFile;

/**
 * Class UpdateCredentialsRequest
 *
 * @package MastodonApi\Accounts
 */
class UpdateCredentialsRequest
{
	/**
	 * @var string $display_name
	 */
	public $display_name;

	/**
	 * @var string $note
	 */
	public $note;

	/**
	 * @var CURLFile $avatar
	 */
	public $avatar;

	/**
	 * @var CURLFile $header
	 */
	public $header;

	/**
	 * @var string $locked true / false
	 */
	public $locked;

	/**
	 * @var UpdateCredentialsRequestSource $source
	 */
	public $source;

	/**
	 * @var array $fields_attributes
	 */
	public $fields_attributes;

	public function __construct(array $data = [])
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'source') $this->source = new UpdateCredentialsRequestSource($value);
			elseif ($key === 'fields_attributes')
			{
				foreach ($value as $row)
				{
					$this->fields_attributes[] = new UpdateCredentialsRequestFieldsAttributes($row);
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
