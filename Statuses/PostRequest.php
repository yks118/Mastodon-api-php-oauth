<?php namespace MastodonApi\Statuses;

/**
 * Class PostRequest
 *
 * @package MastodonApi\Statuses
 */
class PostRequest
{
	/**
	 * @var string $status
	 */
	public $status;

	/**
	 * @var string $in_reply_to_id
	 */
	public $in_reply_to_id;

	/**
	 * @var array $media_ids
	 */
	public $media_ids;

	/**
	 * @var PostRequestPoll $poll
	 */
	public $poll;

	/**
	 * @var bool $sensitive
	 */
	public $sensitive = 'false';

	/**
	 * @var string $spoiler_text
	 */
	public $spoiler_text;

	/**
	 * @var string $visibility direct, private, unlisted, public
	 */
	public $visibility = 'public';

	/**
	 * @var string $scheduled_at
	 */
	public $scheduled_at;

	/**
	 * @var string $language
	 */
	public $language;

	public function __construct(array $data = [])
	{
		foreach ($data as $key => $value)
		{
			if ($key === 'poll') $this->poll = new PostRequestPoll($value);
			else $this->{$key} = $value;
		}

		if (is_null($this->poll))
		{
			$this->poll = new PostRequestPoll();
		}
	}

	public function __set($name, $value)
	{
	}

	public function __get($name)
	{
	}
}
