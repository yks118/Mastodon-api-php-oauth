<?php namespace MastodonApi\Timelines;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Status;
use MastodonApi\MastodonApiConfig;

/**
 * Class Timelines
 *
 * @package MastodonApi\Timelines
 */
class Timelines
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/timelines/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * home
	 *
	 * @see https://docs.joinmastodon.org/api/rest/timelines/#get-api-v1-timelines-home
	 *
	 * @param HomeRequest $request
	 *
	 * @return Curl
	 */
	public function home(HomeRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . 'home')
			->options($request??[])
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			foreach ($result->responseData as $row)
			{
				$result->data[] = new Status($row);
			}
		}

		return $result;
	}

	/**
	 * getPublic
	 *
	 * @see https://docs.joinmastodon.org/api/rest/timelines/#get-api-v1-timelines-public
	 *
	 * @param PublicRequest $request
	 *
	 * @return Curl
	 */
	public function getPublic(PublicRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . 'public')
			->options($request??[])
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			foreach ($result->responseData as $row)
			{
				$result->data[] = new Status($row);
			}
		}

		return $result;
	}

	/**
	 * tag
	 *
	 * @see https://docs.joinmastodon.org/api/rest/timelines/#get-api-v1-timelines-tag-hashtag
	 *
	 * @param string $hashtag
	 * @param TagRequest $request
	 *
	 * @return Curl
	 */
	public function tag(string $hashtag, TagRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . 'tag/' . $hashtag)
			->options($request??[])
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			foreach ($result->responseData as $row)
			{
				$result->data[] = new Status($row);
			}
		}

		return $result;
	}

	/**
	 * getList
	 *
	 * @see https://docs.joinmastodon.org/api/rest/timelines/#get-api-v1-timelines-list-list-id
	 *
	 * @param string $listId
	 * @param ListRequest $request
	 *
	 * @return Curl
	 */
	public function getList(string $listId, ListRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . 'list/' . $listId)
			->options($request??[])
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			foreach ($result->responseData as $row)
			{
				$result->data[] = new Status($row);
			}
		}

		return $result;
	}
}
