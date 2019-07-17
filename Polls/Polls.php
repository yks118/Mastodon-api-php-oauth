<?php namespace MastodonApi\Polls;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Poll;
use MastodonApi\MastodonApiConfig;

/**
 * Class Polls
 *
 * @package MastodonApi\Polls
 */
class Polls
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/polls/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/polls/#get-api-v1-polls-id
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function get(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id)
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Poll($result->responseData);
		}

		return $result;
	}

	/**
	 * votes
	 *
	 * @see https://docs.joinmastodon.org/api/rest/polls/#post-api-v1-polls-id-votes
	 *
	 * @param string $id
	 * @param VotesRequest $request
	 *
	 * @return Curl
	 */
	public function votes(string $id, VotesRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/votes')
			->options($request)
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Poll($result->responseData);
		}

		return $result;
	}
}
