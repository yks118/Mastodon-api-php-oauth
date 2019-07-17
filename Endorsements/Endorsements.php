<?php namespace MastodonApi\Endorsements;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Account;
use MastodonApi\MastodonApiConfig;

/**
 * Class Endorsements
 *
 * @package MastodonApi\Endorsements
 */
class Endorsements
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/endorsements/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/endorsements/#get-api-v1-endorsements
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
			foreach ($result->responseData as $row)
			{
				$result->data[] = new Account($row);
			}
		}

		return $result;
	}
}
