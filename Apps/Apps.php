<?php namespace MastodonApi\Apps;

use MastodonApi\Curl\Curl;
use MastodonApi\MastodonApiConfig;

/**
 * Class Apps
 *
 * @package MastodonApi\Apps
 */
class Apps
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'api/v1/apps/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * apps
	 *
	 * @see https://docs.joinmastodon.org/api/rest/apps/#post-api-v1-apps
	 *
	 * @param Apps\Request $request
	 *
	 * @return Curl
	 */
	public function apps(Apps\Request $request): Curl
	{
		$request->redirect_uris = $this->config->redirectUri();
		$request->scopes = $this->config->scopes();
		$request = json_decode(json_encode($request), true);
		if (isset($request['scopes']) && is_array($request['scopes'])) $request['scopes'] = implode(' ', $request['scopes']);

		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath)
			->options($request)
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Apps\Response($result->responseData);
		}

		return $result;
	}

	/**
	 * verifyCredentials
	 *
	 * @see https://docs.joinmastodon.org/api/rest/apps/#get-api-v1-apps-verify-credentials
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
			$result->data = new VerifyCredentials\Response($result->responseData);
		}

		return $result;
	}
}
