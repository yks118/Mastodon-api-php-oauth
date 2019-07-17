<?php namespace MastodonApi\Accounts;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Account;
use MastodonApi\Entities\Lists;
use MastodonApi\Entities\Relationship;
use MastodonApi\Entities\Status;
use MastodonApi\MastodonApiConfig;

/**
 * Class Accounts
 *
 * @package MastodonApi\Accounts
 */
class Accounts
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/accounts/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/accounts/#get-api-v1-accounts-id
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function get(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id)
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Account($result->responseData);
		}

		return $result;
	}

	public function post(PostRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . rtrim($this->apiPath, '/'))
			->options($request)
			->requestHeader([$this->config->authorization()])
			->curl();

		return $result;
	}

	/**
	 * verifyCredentials
	 *
	 * @see https://docs.joinmastodon.org/api/rest/accounts/#get-api-v1-accounts-verify-credentials
	 *
	 * @return Curl
	 */
	public function verifyCredentials(): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . 'verify_credentials')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Account($result->responseData);
		}

		return $result;
	}

	/**
	 * updateCredentials
	 *
	 * @see https://docs.joinmastodon.org/api/rest/accounts/#patch-api-v1-accounts-update-credentials
	 *
	 * @param UpdateCredentialsRequest $request
	 *
	 * @return Curl
	 */
	public function updateCredentials(UpdateCredentialsRequest $request): Curl
	{
		$request = (array) $request;
		if (isset($request['source'])) $request['source'] = json_decode(json_encode($request['source']), true);
		if (isset($request['fields_attributes'])) $request['fields_attributes'] = json_decode(json_encode($request['fields_attributes']), true);

		$curl = new Curl();
		$result = $curl
			->method('PATCH')
			->url($this->config->url() . $this->apiPath . 'update_credentials')
			->options($request)
			->contentType('multipart/form-data')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Account($result->responseData);
		}

		return $result;
	}

	/**
	 * followers
	 *
	 * @see https://docs.joinmastodon.org/api/rest/accounts/#get-api-v1-accounts-id-followers
	 *
	 * @param string $id
	 * @param FollowersRequest $request
	 *
	 * @return Curl
	 */
	public function followers(string $id, FollowersRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id . '/followers')
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
	 * following
	 *
	 * @see https://docs.joinmastodon.org/api/rest/accounts/#get-api-v1-accounts-id-following
	 *
	 * @param string $id
	 * @param FollowingRequest $request
	 *
	 * @return Curl
	 */
	public function following(string $id, FollowingRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id . '/following')
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
	 * statuses
	 *
	 * @see https://docs.joinmastodon.org/api/rest/accounts/#get-api-v1-accounts-id-statuses
	 *
	 * @param string $id
	 * @param StatusesRequest $request
	 *
	 * @return Curl
	 */
	public function statuses(string $id, StatusesRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id . '/statuses')
			->options($request??[])
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			foreach ($result->responseData as $row)
			{
				$result->data[] = new Status($row);
			}
		}

		return $result;
	}

	/**
	 * follow
	 *
	 * @see https://docs.joinmastodon.org/api/rest/accounts/#post-api-v1-accounts-id-follow
	 *
	 * @param string $id
	 * @param FollowRequest $request
	 *
	 * @return Curl
	 */
	public function follow(string $id, FollowRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/follow')
			->options($request??[])
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Relationship($result->responseData);
		}

		return $result;
	}

	/**
	 * unfollow
	 *
	 * @see https://docs.joinmastodon.org/api/rest/accounts/#post-api-v1-accounts-id-unfollow
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function unfollow(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/unfollow')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Relationship($result->responseData);
		}

		return $result;
	}

	/**
	 * relationships
	 *
	 * @see https://docs.joinmastodon.org/api/rest/accounts/#get-api-v1-accounts-relationships
	 *
	 * @param RelationshipsRequest $request
	 *
	 * @return Curl
	 */
	public function relationships(RelationshipsRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . 'relationships')
			->options($request)
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			foreach ($result->responseData as $row)
			{
				$result->data[] = new Relationship($row);
			}
		}

		return $result;
	}

	/**
	 * search
	 *
	 * @see https://docs.joinmastodon.org/api/rest/accounts/#get-api-v1-accounts-search
	 *
	 * @param SearchRequest $request
	 *
	 * @return Curl
	 */
	public function search(SearchRequest $request): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . 'search')
			->options($request)
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
	 * block
	 *
	 * @see https://docs.joinmastodon.org/api/rest/blocks/#post-api-v1-accounts-id-block
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function block(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/block')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Relationship($result->responseData);
		}

		return $result;
	}

	/**
	 * unblock
	 *
	 * @see https://docs.joinmastodon.org/api/rest/blocks/#post-api-v1-accounts-id-unblock
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function unblock(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/unblock')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Relationship($result->responseData);
		}

		return $result;
	}

	/**
	 * pin
	 *
	 * @see https://docs.joinmastodon.org/api/rest/endorsements/#post-api-v1-accounts-id-pin
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function pin(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/pin')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Relationship($result->responseData);
		}

		return $result;
	}

	/**
	 * unpin
	 *
	 * @see https://docs.joinmastodon.org/api/rest/endorsements/#post-api-v1-accounts-id-unpin
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function unpin(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/unpin')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Relationship($result->responseData);
		}

		return $result;
	}

	/**
	 * lists
	 *
	 * @see https://docs.joinmastodon.org/api/rest/lists/#get-api-v1-accounts-id-lists
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function lists(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id . '/lists')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			foreach ($result->responseData as $row)
			{
				$result->data[] = new Lists($row);
			}
		}

		return $result;
	}

	/**
	 * mute
	 *
	 * @see https://docs.joinmastodon.org/api/rest/mutes/#post-api-v1-accounts-id-mute
	 *
	 * @param string $id
	 * @param MuteRequest $request
	 *
	 * @return Curl
	 */
	public function mute(string $id, MuteRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/mute')
			->options($request??[])
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Relationship($result->responseData);
		}

		return $result;
	}

	/**
	 * unmute
	 *
	 * @see https://docs.joinmastodon.org/api/rest/mutes/#post-api-v1-accounts-id-unmute
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function unmute(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/unmute')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Relationship($result->responseData);
		}

		return $result;
	}
}
