<?php namespace MastodonApi\Suggestions;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Account;
use MastodonApi\MastodonApiConfig;

/**
 * Class Suggestions
 *
 * @package MastodonApi\Suggestions
 */
class Suggestions
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/suggestions/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/follow-suggestions/#get-api-v1-suggestions
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

	/**
	 * delete
	 *
	 * @see https://docs.joinmastodon.org/api/rest/follow-suggestions/#delete-api-v1-suggestions-account-id
	 *
	 * @param string $accountId
	 *
	 * @return Curl
	 */
	public function delete(string $accountId): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('DELETE')
			->url($this->config->url() . $this->apiPath . $accountId)
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
