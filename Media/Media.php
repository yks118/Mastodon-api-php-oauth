<?php namespace MastodonApi\Media;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Attachment;
use MastodonApi\MastodonApiConfig;

/**
 * Class Media
 *
 * @package MastodonApi\Media
 */
class Media
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/media/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * post
	 *
	 * @see https://docs.joinmastodon.org/api/rest/media/#post-api-v1-media
	 *
	 * @param PostRequest $request
	 *
	 * @return Curl
	 */
	public function post(PostRequest $request): Curl
	{
		$request = (array) $request;

		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath)
			->options($request)
			->contentType('multipart/form-data')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Attachment($result->responseData);
		}

		return $result;
	}

	/**
	 * put
	 *
	 * @see https://docs.joinmastodon.org/api/rest/media/#put-api-v1-media-id
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
			$result->data = new Attachment($result->responseData);
		}

		return $result;
	}
}
