<?php namespace MastodonApi\FollowRequests;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Account;
use MastodonApi\MastodonApiConfig;

/**
 * Class FollowRequests
 *
 * @package MastodonApi\FollowRequests
 */
class FollowRequests
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/follow_requests/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/follow-requests/#get-api-v1-follow-requests
	 *
	 * @param GetRequest $request
	 *
	 * @return Curl
	 */
	public function get(GetRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath)
			->options($request??[])
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			foreach ($result->responseData as $row)
			{
				$result->data[] = new Account($row);
			}
		}

		return $result;
	}

	/**
	 * authorize
	 *
	 * @see https://docs.joinmastodon.org/api/rest/follow-requests/#post-api-v1-follow-requests-id-authorize
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function authorize(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/authorize')
			->requestHeader([$this->config->authorization()])
			->curl();

		/*
		if ($result->response->httpCode === 200)
		{
			// return none
		}
		*/

		return $result;
	}

	/**
	 * reject
	 *
	 * @see https://docs.joinmastodon.org/api/rest/follow-requests/#post-api-v1-follow-requests-id-reject
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function reject(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/reject')
			->requestHeader([$this->config->authorization()])
			->curl();

		/*
		if ($result->response->httpCode === 200)
		{
			// return none
		}
		*/

		return $result;
	}
}
