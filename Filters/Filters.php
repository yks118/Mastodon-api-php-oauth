<?php namespace MastodonApi\Filters;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Filter;
use MastodonApi\MastodonApiConfig;

/**
 * Class Filters
 *
 * @package MastodonApi\Filters
 */
class Filters
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/filters/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/filters/#get-api-v1-filters
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function get(string $id = ''): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id)
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			if (empty($id))
			{
				foreach ($result->responseData as $row)
				{
					$result->data[] = new Filter($row);
				}
			}
			else
			{
				$result->data = new Filter($result->responseData);
			}
		}

		return $result;
	}

	/**
	 * post
	 *
	 * @see https://docs.joinmastodon.org/api/rest/filters/#get-api-v1-filters
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

		if ($result->response->httpCode === 200)
		{
			$result->data = new Filter($result->responseData);
		}

		return $result;
	}

	/**
	 * put
	 *
	 * @see https://docs.joinmastodon.org/api/rest/filters/#put-api-v1-filters-id
	 *
	 * @param string $id
	 * @param PutRequest $request
	 *
	 * @return Curl
	 */
	public function put(string $id, PutRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('PUT')
			->url($this->config->url() . $this->apiPath . $id)
			->options($request)
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Filter($result->responseData);
		}

		return $result;
	}

	/**
	 * delete
	 *
	 * @see https://docs.joinmastodon.org/api/rest/filters/#delete-api-v1-filters-id
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function delete(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('DELETE')
			->url($this->config->url() . $this->apiPath . $id)
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
