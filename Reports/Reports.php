<?php namespace MastodonApi\Reports;

use MastodonApi\Curl\Curl;
use MastodonApi\MastodonApiConfig;

/**
 * Class Reports
 *
 * @package MastodonApi\Reports
 */
class Reports
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/reports/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * post
	 *
	 * @see https://docs.joinmastodon.org/api/rest/reports/#post-api-v1-reports
	 *
	 * @param PostRequest $request
	 *
	 * @return Curl
	 */
	public function post(PostRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath)
			->options($request)
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
