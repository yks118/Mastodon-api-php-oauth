<?php namespace MastodonApi\Instance;

use MastodonApi\Curl\Curl;
use MastodonApi\MastodonApiConfig;

/**
 * Class Instance
 *
 * @package MastodonApi\Instance
 */
class Instance
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/instance/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/instances/#get-api-v1-instance
	 *
	 * @return Curl
	 */
	public function get(): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath)
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new \MastodonApi\Entities\Instance($result->responseData);
		}

		return $result;
	}
}
