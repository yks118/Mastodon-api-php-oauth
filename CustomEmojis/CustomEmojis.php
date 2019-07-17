<?php namespace MastodonApi\CustomEmojis;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Emoji;
use MastodonApi\MastodonApiConfig;

/**
 * Class CustomEmojis
 *
 * @package MastodonApi\CustomEmojis
 */
class CustomEmojis
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/custom_emojis/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * get
	 *
	 * @see https://docs.joinmastodon.org/api/rest/custom-emojis/#get-api-v1-custom-emojis
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
				$result->data[] = new Emoji($row);
			}
		}

		return $result;
	}
}
