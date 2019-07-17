<?php namespace MastodonApi\Oauth;

use MastodonApi\Curl\Curl;
use MastodonApi\Entities\Token;
use MastodonApi\MastodonApiConfig;

/**
 * Class Oauth
 *
 * @package MastodonApi\Oauth
 */
class Oauth
{
	/**
	 * @var MastodonApiConfig $config
	 */
	private $config;

	/**
	 * @var string $apiPath
	 */
	private $apiPath = 'oauth/';

	public function __construct(MastodonApiConfig $config)
	{
		$this->config = $config;
	}

	/**
	 * authorize
	 *
	 * @see https://docs.joinmastodon.org/api/authentication/#get-oauth-authorize
	 *
	 * @return string
	 */
	public function authorize(): string
	{
		// set request
		$request = new AuthorizeRequest($this->config->getData());
		$request = json_decode(json_encode($request), true);
		if (isset($request['scopes']) && is_array($request['scopes']))
		{
			$request['scope'] = implode(' ', $request['scopes']);
			unset($request['scopes']);
		}

		return $this->config->url() . $this->apiPath . 'authorize?' . http_build_query($request);
	}

	/**
	 * token
	 *
	 * @see https://docs.joinmastodon.org/api/authentication/#post-oauth-token
	 *
	 * @param TokenRequest $request
	 *
	 * @return Curl
	 */
	public function token(TokenRequest $request): Curl
	{
		// set request
		$request->client_id = $this->config->clientId();
		$request->client_secret = $this->config->clientSecret();
		$request->redirect_uri = $this->config->redirectUri();
		$request = json_decode(json_encode($request), true);
		if (isset($request['scopes']) && is_array($request['scopes']))
		{
			$request['scope'] = implode(' ', $request['scopes']);
			unset($request['scopes']);
		}

		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . 'token')
			->options($request)
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = new Token($result->responseData);
		}

		return $result;
	}

	/**
	 * revoke
	 *
	 * @see https://docs.joinmastodon.org/api/authentication/#post-oauth-revoke
	 *
	 * @return Curl
	 */
	public function revoke(): Curl
	{
		$curl = new Curl();
		$result = $curl
			->method('POST')
			->url($this->config->url() . $this->apiPath . 'revoke')
			->requestHeader([$this->config->authorization()])
			->curl();

		if ($result->response->httpCode === 200)
		{
			$result->data = $result->responseData;
		}

		return $result;
	}
}
