<?php namespace MastodonApi\Favourites;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Status;
use MastodonApi\MastodonApiConfig;

/**
 * Class Favourites
 *
 * @package MastodonApi\Favourites
 */
class Favourites
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/favourites/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/favourites/#get-api-v1-favourites
	 *
	 * @param GetRequest $request
	 *
	 * @return Curl
	 */
	public function get(GetRequest $request = null): Curl
	{
		$request = json_decode(json_encode($request), true);

		$curl = new Curl();
		$result = $curl
			->method('GET')
			->url($this->config->url() . $this->apiPath)
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
}
