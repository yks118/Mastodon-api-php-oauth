<?php namespace MastodonApi\Lists;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Account;
use MastodonApi\MastodonApiConfig;

/**
 * Class Lists
 *
 * @package MastodonApi\Lists
 */
class Lists
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/lists/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/lists/#get-api-v1-lists
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
				$result->data[] = new \MastodonApi\Entities\Lists($row);
			}
		}

		return $result;
	}

	/**
	 * accounts
	 *
	 * @see https://docs.joinmastodon.org/api/rest/lists/#get-api-v1-lists-id-accounts
	 *
	 * @param string $id
	 * @param AccountsRequest $request
	 *
	 * @return Curl
	 */
	public function accounts(string $id, AccountsRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id . '/accounts')
			->options($request??[])
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
	 * post
	 *
	 * @see https://docs.joinmastodon.org/api/rest/lists/#post-api-v1-lists
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
			$result->data = new \MastodonApi\Entities\Lists($result->responseData);
		}

		return $result;
	}

	/**
	 * put
	 *
	 * @see https://docs.joinmastodon.org/api/rest/lists/#put-api-v1-lists-id
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
			$result->data = new \MastodonApi\Entities\Lists($result->responseData);
		}

		return $result;
	}

	/**
	 * delete
	 *
	 * @see https://docs.joinmastodon.org/api/rest/lists/#delete-api-v1-lists-id
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

	/**
	 * postAccounts
	 *
	 * @see https://docs.joinmastodon.org/api/rest/lists/#post-api-v1-lists-id-accounts
	 *
	 * @param string $id
	 * @param PostAccountsRequest $request
	 *
	 * @return Curl
	 */
	public function postAccounts(string $id, PostAccountsRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/accounts')
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

	/**
	 * deleteAccounts
	 *
	 * @see https://docs.joinmastodon.org/api/rest/lists/#delete-api-v1-lists-id-accounts
	 *
	 * @param string $id
	 * @param DeleteAccountsRequest $request
	 *
	 * @return Curl
	 */
	public function deleteAccounts(string $id, DeleteAccountsRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('DELETE')
			->url($this->config->url() . $this->apiPath . $id . '/accounts')
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
