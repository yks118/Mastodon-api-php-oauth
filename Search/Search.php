<?php namespace MastodonApi\Search;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Results;
use MastodonApi\MastodonApiConfig;

/**
 * Class Search
 *
 * @package MastodonApi\Search
 */
class Search
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/search/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/search/#get-api-v2-search
	 *
	 * @param GetRequest $request
	 *
	 * @return Curl
	 */
	public function get(GetRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath)
			->options($request)
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Results($result->responseData);
		}

		return $result;
	}
}
