<?php namespace MastodonApi\Push;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\PushSubscription;
use MastodonApi\MastodonApiConfig;

/**
 * Class Push
 *
 * @package MastodonApi\Push
 */
class Push
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/push/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * postSubscription
	 *
	 * @see https://docs.joinmastodon.org/api/rest/notifications/#post-api-v1-push-subscription
	 *
	 * @param PostSubscriptionRequest $request
	 *
	 * @return Curl
	 */
	public function postSubscription(PostSubscriptionRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . 'subscription')
			->options($request)
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new PushSubscription($result->responseData);
		}

		return $result;
	}

	/**
	 * getSubscription
	 *
	 * @see https://docs.joinmastodon.org/api/rest/notifications/#get-api-v1-push-subscription
	 *
	 * @return Curl
	 */
	public function getSubscription(): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . 'subscription')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new PushSubscription($result->data);
		}

		return $result;
	}

	/**
	 * putSubscription
	 *
	 * @see https://docs.joinmastodon.org/api/rest/notifications/#put-api-v1-push-subscription
	 *
	 * @param PutSubscriptionRequest $request
	 *
	 * @return Curl
	 */
	public function putSubscription(PutSubscriptionRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('PUT')
			->url($this->config->url() . $this->apiPath . 'subscription')
			->options($request??[])
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new PushSubscription($result->data);
		}

		return $result;
	}

	/**
	 * deleteSubscription
	 *
	 * @see https://docs.joinmastodon.org/api/rest/notifications/#delete-api-v1-push-subscription
	 *
	 * @return Curl
	 */
	public function deleteSubscription(): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('DELETE')
			->url($this->config->url() . $this->apiPath . 'subscription')
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
