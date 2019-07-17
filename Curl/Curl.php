<?php namespace MastodonApi\Curl;

/**
 * Class Curl
 *
 * @package Coolsms\Curl
 */
class Curl
{
	/**
	 * @var string $method
	 */
	private $method = '';

	/**
	 * @var string $url
	 */
	private $url = '';

	/**
	 * @var array $options
	 */
	private $options = [];

	/**
	 * @var array $requestHeader
	 */
	private $requestHeader = [];

	/**
	 * @var string $contentType
	 */
	private $contentType = 'application/json';

	/**
	 * @var mixed $data
	 */
	public $data;

	/**
	 * @var array $responseData
	 */
	public $responseData = [];

	/**
	 * @var Response $response
	 */
	public $response;

	/**
	 * @var Error $error
	 */
	public $error;

	private function nullIsUnset(array $data): array
	{
		foreach ($data as $key => $value)
		{
			if (is_array($value)) $data[$key] = $this->nullIsUnset($value);
			elseif (empty($value)) unset($data[$key]);
		}

		return $data;
	}

	private function multipartFormData(array $options, string $parent = null): array
	{
		foreach ($options as $key => $value)
		{
			if (empty($value)) $options[$key] = null;
			elseif (is_array($value))
			{
				if (is_null($parent)) $options = array_merge($options, $this->multipartFormData($value, $key));
				else $options = array_merge($options, $this->multipartFormData($value, $parent . '[' . $key . ']'));
				$options[$key] = null;
			}
			elseif ($parent)
			{
				$options[$parent . '[' . $key . ']'] = $value;
				$options[$key] = null;
			}
		}

		return array_filter($options);
	}

	/**
	 * method
	 *
	 * @param string $method
	 *
	 * @return Curl
	 */
	public function method(string $method): Curl
	{
		$this->method = strtoupper($method);
		return $this;
	}

	/**
	 * url
	 *
	 * @param string $url
	 *
	 * @return Curl
	 */
	public function url(string $url): Curl
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * options
	 *
	 * @param array $options
	 *
	 * @return Curl
	 */
	public function options(array $options): Curl
	{
		$this->options = $this->nullIsUnset($options);
		return $this;
	}

	/**
	 * requestHeader
	 *
	 * @param array $requestHeader
	 *
	 * @return Curl
	 */
	public function requestHeader(array $requestHeader): Curl
	{
		$this->requestHeader = array_merge($this->requestHeader, $requestHeader);
		return $this;
	}

	/**
	 * contentType
	 *
	 * @param string $contentType
	 *
	 * @return Curl
	 */
	public function contentType(string $contentType): Curl
	{
		$this->contentType = $contentType;
		return $this;
	}

	public function curl(): Curl
	{
		if ($this->method === 'GET' && count($this->options) > 0)
		{
			$httpBuildQuery = http_build_query($this->options);

			// replace [0] (500 Error) => []
			$httpBuildQuery = preg_replace('/(%5B)[0-9]+(%5D)/', '$1$2', $httpBuildQuery);

			$this->url .= '?' . $httpBuildQuery;
		}

		if (function_exists('curl_init'))
		{
			$ch = curl_init();

			// set url
			curl_setopt($ch, CURLOPT_URL, $this->url);

			// set method
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->method);

			// set request header in content-type
			$this->requestHeader[] = 'Content-Type: ' . $this->contentType;

			// set request header
			curl_setopt($ch, CURLOPT_HTTPHEADER, $this->requestHeader);

			// set return
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			if ($this->contentType === 'multipart/form-data')
			{
				curl_setopt($ch, CURLOPT_POSTFIELDS, $this->multipartFormData($this->options));
			}
			elseif ($this->contentType === 'application/json' && $this->method !== 'GET' && count($this->options) > 0)
			{
				// set options
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->options));
			}

			// set timeout
			// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
			// curl_setopt($ch, CURLOPT_TIMEOUT, 1);

			$this->responseData = json_decode(curl_exec($ch), true);
			$this->response = new Response(curl_getinfo($ch));

			// set error
			$this->error = new Error();
			if (isset($this->responseData['errorCode'], $this->responseData['errorMessage']))
			{
				$this->error->code = $this->responseData['errorCode'];
				$this->error->message = $this->responseData['errorMessage'];
			}

			curl_close($ch);
		}

		return $this;
	}
}
