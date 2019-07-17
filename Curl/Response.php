<?php namespace MastodonApi\Curl;

/**
 * Class Response
 *
 * @package MastodonApi\Curl
 */
class Response
{
	/**
	 * @var string $url
	 */
	public $url;

	/**
	 * @var string $contentType
	 */
	public $contentType;

	/**
	 * @var int $httpCode
	 */
	public $httpCode;

	/**
	 * @var int $headerSize
	 */
	public $headerSize;

	/**
	 * @var int $requestSize
	 */
	public $requestSize;

	/**
	 * @var int $sslVerifyResult
	 */
	public $sslVerifyResult;

	/**
	 * @var int $redirectCount
	 */
	public $redirectCount;

	/**
	 * @var float $totalTime
	 */
	public $totalTime;

	/**
	 * @var float $namelookupTime
	 */
	public $namelookupTime;

	/**
	 * @var float $connectTime
	 */
	public $connectTime;

	/**
	 * @var float $pretransferTime
	 */
	public $pretransferTime;

	/**
	 * @var float $sizeUpload
	 */
	public $sizeUpload;

	/**
	 * @var float $sizeDownload
	 */
	public $sizeDownload;

	/**
	 * @var float $speedDownload
	 */
	public $speedDownload;

	/**
	 * @var float $speedUpload
	 */
	public $speedUpload;

	/**
	 * @var float $downloadContentLength
	 */
	public $downloadContentLength;

	/**
	 * @var float $uploadContentLength
	 */
	public $uploadContentLength;

	/**
	 * @var float $starttransferTime
	 */
	public $starttransferTime;

	/**
	 * @var float $redirectTime
	 */
	public $redirectTime;

	/**
	 * @var string $redirectUrl
	 */
	public $redirectUrl;

	/**
	 * @var string $primaryIp
	 */
	public $primaryIp;

	/**
	 * @var array $certinfo
	 */
	public $certinfo;

	/**
	 * @var int $primaryPort
	 */
	public $primaryPort;

	/**
	 * @var string $localIp
	 */
	public $localIp;

	/**
	 * @var int $localPort
	 */
	public $localPort;

	public function __construct(array $data)
	{
		foreach ($data as $key => $value)
		{
			$keys = array_map('ucfirst', explode('_', $key));
			$key = lcfirst(implode('', $keys));
			$this->{$key} = $value;
		}

		$this->httpCode = intval($this->httpCode);
		$this->headerSize = intval($this->headerSize);
		$this->requestSize = intval($this->requestSize);
		$this->sslVerifyResult = intval($this->sslVerifyResult);
		$this->redirectCount = intval($this->redirectCount);
		$this->totalTime = floatval($this->totalTime);
		$this->namelookupTime = floatval($this->namelookupTime);
		$this->connectTime = floatval($this->connectTime);
		$this->pretransferTime = floatval($this->pretransferTime);
		$this->sizeUpload = floatval($this->sizeUpload);
		$this->sizeDownload = floatval($this->sizeDownload);
		$this->speedDownload = floatval($this->speedDownload);
		$this->speedUpload = floatval($this->speedUpload);
		$this->downloadContentLength = floatval($this->downloadContentLength);
		$this->uploadContentLength = floatval($this->uploadContentLength);
		$this->starttransferTime = floatval($this->starttransferTime);
		$this->redirectTime = floatval($this->redirectTime);
		$this->primaryPort = intval($this->primaryPort);
		$this->localPort = intval($this->localPort);
	}

	public function __set($name, $value)
	{
	}

	public function __get($name)
	{
	}
}
