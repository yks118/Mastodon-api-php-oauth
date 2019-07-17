<?php namespace MastodonApi\ScheduledStatuses;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\ScheduledStatus;
use MastodonApi\MastodonApiConfig;

/**
 * Class ScheduledStatuses
 *
 * @package MastodonApi\ScheduledStatuses
 */
class ScheduledStatuses
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/scheduled_statuses/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/scheduled-statuses/#get-api-v1-scheduled-statuses
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
			foreach ($result->responseData as $row)
			{
				$result->data[] = new ScheduledStatus($row);
			}
		}

		return $result;
	}

	/**
	 * put
	 *
	 * @see https://docs.joinmastodon.org/api/rest/scheduled-statuses/#put-api-v1-scheduled-statuses-id
	 *
	 * @param string $id
	 * @param PutRequest $request
	 *
	 * @return Curl
	 */
	public function put(string $id, PutRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('PUT')
			->url($this->config->url() . $this->apiPath . $id)
			->options($request??[])
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new ScheduledStatus($result->responseData);
		}

		return $result;
	}

	/**
	 * delete
	 *
	 * @see https://docs.joinmastodon.org/api/rest/scheduled-statuses/#delete-api-v1-scheduled-statuses-id
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
