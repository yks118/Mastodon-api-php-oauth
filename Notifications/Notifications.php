<?php namespace MastodonApi\Notifications;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Notification;
use MastodonApi\MastodonApiConfig;

/**
 * Class Notifications
 *
 * @package MastodonApi\Notifications
 */
class Notifications
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/notifications/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/notifications/#get-api-v1-notifications
	 *
	 * @param string $id
	 * @param GetRequest $request
	 *
	 * @return Curl
	 */
	public function get(string $id = '', GetRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id)
			->options($request??[])
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			foreach ($result->responseData as $row)
			{
				$result->data[] = new Notification($row);
			}
		}

		return $result;
	}

	/**
	 * clear
	 *
	 * @see https://docs.joinmastodon.org/api/rest/notifications/#post-api-v1-notifications-clear
	 *
	 * @return Curl
	 */
	public function clear(): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . 'clear')
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
	 * dismiss
	 *
	 * @see https://docs.joinmastodon.org/api/rest/notifications/#post-api-v1-notifications-dismiss
	 *
	 * @param DismissRequest $request
	 *
	 * @return Curl
	 */
	public function dismiss(DismissRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . 'dismiss')
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
