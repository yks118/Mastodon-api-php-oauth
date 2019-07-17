<?php namespace MastodonApi\Entities;

/**
 * Class Instance
 *
 * @package MastodonApi\Entities
 */
class Instance
{
	/**
	 * @var string $uri
	 */
	public $uri;

	/**
	 * @var string $title
	 */
	public $title;

	/**
	 * @var string $description
	 */
	public $description;

	/**
	 * @var string $short_description
	 */
	public $short_description;

	/**
	 * @var string $email
	 */
	public $email;

	/**
	 * @var string $version
	 */
	public $version;

	/**
	 * @var string $thumbnail
	 */
	public $thumbnail;

	/**
	 * @var InstanceUrls $urls
	 */
	public $urls;

	/**
	 * @var InstanceStats $stats
	 */
	public $stats;

	/**
	 * @var array $languages
	 */
	public $languages;

	/**
	 * @var Account $contact_account
	 */
	public $contact_account;

	/**
	 * @var bool $registrations
	 */
	public $registrations;

	/**
	 * @var bool $approval_required
	 */
	public $approval_required;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'urls') $this->urls = new InstanceUrls($value);
			elseif ($key === 'stats') $this->stats = new InstanceStats($value);
			elseif ($key === 'contact_account' && $value) $this->contact_account = new Account($value);
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
