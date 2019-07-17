<?php namespace MastodonApi;

use MastodonApi\Accounts\Accounts;
use MastodonApi\Apps\Apps;
use MastodonApi\Blocks\Blocks;
use MastodonApi\Conversations\Conversations;
use MastodonApi\CustomEmojis\CustomEmojis;
use MastodonApi\DomainBlocks\DomainBlocks;
use MastodonApi\Endorsements\Endorsements;
use MastodonApi\Favourites\Favourites;
use MastodonApi\Filters\Filters;
use MastodonApi\FollowRequests\FollowRequests;
use MastodonApi\Instance\Instance;
use MastodonApi\Lists\Lists;
use MastodonApi\Media\Media;
use MastodonApi\Mutes\Mutes;
use MastodonApi\Notifications\Notifications;
use MastodonApi\Oauth\Oauth;
use MastodonApi\Polls\Polls;
use MastodonApi\Push\Push;
use MastodonApi\Reports\Reports;
use MastodonApi\ScheduledStatuses\ScheduledStatuses;
use MastodonApi\Search\Search;
use MastodonApi\Statuses\Statuses;
use MastodonApi\Streaming\Streaming;
use MastodonApi\Suggestions\Suggestions;
use MastodonApi\Timelines\Timelines;

/**
 * Class MastodonApi
 *
 * @package MastodonApi
 */
class MastodonApi
{
	/**
	 * @var Apps $apps
	 */
	public $apps;

	/**
	 * @var Oauth $oauth
	 */
	public $oauth;

	/**
	 * @var Accounts $accounts
	 */
	public $accounts;

	/**
	 * @var Blocks $blocks
	 */
	public $blocks;

	/**
	 * @var CustomEmojis $customEmojis
	 */
	public $customEmojis;

	/**
	 * @var DomainBlocks $domainBlocks
	 */
	public $domainBlocks;

	/**
	 * @var Endorsements $endorsements
	 */
	public $endorsements;

	/**
	 * @var Favourites $favourites
	 */
	public $favourites;

	/**
	 * @var Statuses $statuses
	 */
	public $statuses;

	/**
	 * @var Filters $filters
	 */
	public $filters;

	/**
	 * @var FollowRequests $followRequests
	 */
	public $followRequests;

	/**
	 * @var Suggestions $suggestions
	 */
	public $suggestions;

	/**
	 * @var Instance $instance
	 */
	public $instance;

	/**
	 * @var Lists $lists
	 */
	public $lists;

	/**
	 * @var Media $media
	 */
	public $media;

	/**
	 * @var Mutes $mutes
	 */
	public $mutes;

	/**
	 * @var Notifications $notifications
	 */
	public $notifications;

	/**
	 * @var Push $push
	 */
	public $push;

	/**
	 * @var Polls $polls
	 */
	public $polls;

	/**
	 * @var Reports $reports
	 */
	public $reports;

	/**
	 * @var ScheduledStatuses $scheduledStatuses
	 */
	public $scheduledStatuses;

	/**
	 * @var Search $search
	 */
	public $search;

	/**
	 * @var Timelines $timelines
	 */
	public $timelines;

	/**
	 * @var Conversations $conversations
	 */
	public $conversations;

	public function __construct(MastodonApiConfig $config)
	{
		$this->apps = new Apps($config);
		$this->oauth = new Oauth($config);
		$this->accounts = new Accounts($config);
		$this->blocks = new Blocks($config);
		$this->customEmojis = new CustomEmojis($config);
		$this->domainBlocks = new DomainBlocks($config);
		$this->endorsements = new Endorsements($config);
		$this->favourites = new Favourites($config);
		$this->statuses = new Statuses($config);
		$this->filters = new Filters($config);
		$this->followRequests = new FollowRequests($config);
		$this->suggestions = new Suggestions($config);
		$this->instance = new Instance($config);
		$this->lists = new Lists($config);
		$this->media = new Media($config);
		$this->mutes = new Mutes($config);
		$this->notifications = new Notifications($config);
		$this->push = new Push($config);
		$this->polls = new Polls($config);
		$this->reports = new Reports($config);
		$this->scheduledStatuses = new ScheduledStatuses($config);
		$this->search = new Search($config);
		$this->timelines = new Timelines($config);
		$this->conversations = new Conversations($config);
	}
}
