<?php namespace MastodonApi\Conversations;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Conversation;
use MastodonApi\MastodonApiConfig;

/**
 * Class Conversations
 *
 * @package MastodonApi\Conversations
 */
class Conversations
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/conversations/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/timelines/#get-api-v1-conversations
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
				$result->data[] = new Conversation($row);
			}
		}

		return $result;
	}
}
