<?php namespace MastodonApi\Entities;

/**
 * Class Status
 *
 * @package MastodonApi\Entities
 */
class Status
{
	/**
	 * @var string $id
	 */
	public $id;

	/**
	 * @var string $uri
	 */
	public $uri;

	/**
	 * @var string $url
	 */
	public $url;

	/**
	 * @var Account $account
	 */
	public $account;

	/**
	 * @var string $in_reply_to_id
	 */
	public $in_reply_to_id;

	/**
	 * @var string $in_reply_to_account_id
	 */
	public $in_reply_to_account_id;

	/**
	 * @var Status $reblog
	 */
	public $reblog;

	/**
	 * @var string $content
	 */
	public $content;

	/**
	 * @var string $created_at
	 */
	public $created_at;

	/**
	 * @var array $emojis
	 */
	public $emojis;

	/**
	 * @var int $replies_count
	 */
	public $replies_count;

	/**
	 * @var int $reblogs_count
	 */
	public $reblogs_count;

	/**
	 * @var int $favourites_count
	 */
	public $favourites_count;

	/**
	 * @var bool $reblogged
	 */
	public $reblogged;

	/**
	 * @var bool $favourited
	 */
	public $favourited;

	/**
	 * @var bool $muted
	 */
	public $muted;

	/**
	 * @var bool $sensitive
	 */
	public $sensitive;

	/**
	 * @var string $spoiler_text
	 */
	public $spoiler_text;

	/**
	 * @var string $visibility public / unlisted / private / direct
	 */
	public $visibility;

	/**
	 * @var array $media_attachments
	 */
	public $media_attachments;

	/**
	 * @var array $mentions
	 */
	public $mentions;

	/**
	 * @var array $tags
	 */
	public $tags;

	/**
	 * @var Card $card
	 */
	public $card;

	/**
	 * @var Poll $poll
	 */
	public $poll;

	/**
	 * @var Application $application
	 */
	public $application;

	/**
	 * @var string $language
	 */
	public $language;

	/**
	 * @var bool $pinned
	 */
	public $pinned;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'account') $this->account = new Account($value);
			elseif ($key === 'reblog' && $value) $this->reblog = new Status($value);
			elseif ($key === 'emojis')
			{
				foreach ($value as $row)
				{
					$this->emojis[] = new Emoji($row);
				}
			}
			elseif ($key === 'media_attachments')
			{
				foreach ($value as $row)
				{
					$this->media_attachments[] = new Attachment($row);
				}
			}
			elseif ($key === 'mentions')
			{
				foreach ($value as $row)
				{
					$this->mentions[] = new Mention($row);
				}
			}
			elseif ($key === 'tags')
			{
				foreach ($value as $row)
				{
					$this->tags[] = new Tags($row);
				}
			}
			elseif ($key === 'card' && $value) $this->card = new Card($value);
			elseif ($key === 'poll' && $value) $this->poll = new Poll($value);
			elseif ($key === 'application' && $value) $this->application = new Application($value);
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
