<?php namespace MastodonApi\Statuses;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Account;
use MastodonApi\Entities\Card;
use MastodonApi\Entities\Context;
use MastodonApi\Entities\Status;
use MastodonApi\MastodonApiConfig;

/**
 * Class Statuses
 *
 * @package MastodonApi\Statuses
 */
class Statuses
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/statuses/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * favourite
	 *
	 * @see https://docs.joinmastodon.org/api/rest/favourites/#post-api-v1-statuses-id-favourite
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function favourite(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/favourite')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Status($result->responseData);
		}

		return $result;
	}

	/**
	 * unfavourite
	 *
	 * @see https://docs.joinmastodon.org/api/rest/favourites/#post-api-v1-statuses-id-unfavourite
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function unfavourite(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/unfavourite')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Status($result->responseData);
		}

		return $result;
	}

	/**
	 * mute
	 *
	 * @see https://docs.joinmastodon.org/api/rest/mutes/#post-api-v1-statuses-id-mute
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function mute(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/mute')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Status($result->responseData);
		}

		return $result;
	}

	/**
	 * unmute
	 *
	 * @see https://docs.joinmastodon.org/api/rest/mutes/#post-api-v1-statuses-id-unmute
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
			$result->data = new Status($result->responseData);
		}

		return $result;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/statuses/#get-api-v1-statuses-id
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
			$result->data = new Status($result->responseData);
		}

		return $result;
	}

	/**
	 * getContext
	 *
	 * @see https://docs.joinmastodon.org/api/rest/statuses/#get-api-v1-statuses-id-context
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function getContext(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id . '/context')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Context($result->responseData);
		}

		return $result;
	}

	/**
	 * getCard
	 *
	 * @see https://docs.joinmastodon.org/api/rest/statuses/#get-api-v1-statuses-id-card
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function getCard(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id . '/card')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Card($result->responseData);
		}

		return $result;
	}

	/**
	 * getRebloggedBy
	 *
	 * @see https://docs.joinmastodon.org/api/rest/statuses/#get-api-v1-statuses-id-reblogged-by
	 *
	 * @param string $id
	 * @param GetRebloggedByRequest|null $request
	 *
	 * @return Curl
	 */
	public function getRebloggedBy(string $id, GetRebloggedByRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id . '/reblogged_by')
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
	 * getFavouritedBy
	 *
	 * @see https://docs.joinmastodon.org/api/rest/statuses/#get-api-v1-statuses-id-favourited-by
	 *
	 * @param string $id
	 * @param GetFavouritedByRequest|null $request
	 *
	 * @return Curl
	 */
	public function getFavouritedBy(string $id, GetFavouritedByRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath . $id . '/favourited_by')
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
	 * @see https://docs.joinmastodon.org/api/rest/statuses/#post-api-v1-statuses
	 *
	 * @param PostRequest $request
	 *
	 * @return Curl
	 */
	public function post(PostRequest $request): Curl
	{
		if (!is_array($request->poll->options) || count($request->poll->options) <= 0) unset($request->poll);
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
			$result->data = new Status($result->responseData);
		}

		return $result;
	}

	/**
	 * delete
	 *
	 * @see https://docs.joinmastodon.org/api/rest/statuses/#delete-api-v1-statuses-id
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
	 * postReblog
	 *
	 * @see https://docs.joinmastodon.org/api/rest/statuses/#post-api-v1-statuses-id-reblog
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function postReblog(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/reblog')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Status($result->responseData);
		}

		return $result;
	}

	/**
	 * postUnreblog
	 *
	 * @see https://docs.joinmastodon.org/api/rest/statuses/#post-api-v1-statuses-id-unreblog
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function postUnreblog(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/unreblog')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Status($result->responseData);
		}

		return $result;
	}

	/**
	 * postPin
	 *
	 * @see https://docs.joinmastodon.org/api/rest/statuses/#post-api-v1-statuses-id-pin
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function postPin(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/pin')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Status($result->responseData);
		}

		return $result;
	}

	/**
	 * postUnpin
	 *
	 * @see https://docs.joinmastodon.org/api/rest/statuses/#post-api-v1-statuses-id-unpin
	 *
	 * @param string $id
	 *
	 * @return Curl
	 */
	public function postUnpin(string $id): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . $id . '/unpin')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Status($result->responseData);
		}

		return $result;
	}
}
