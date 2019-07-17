# Mastodon-api-php-oauth
A GNU Social-compatible microblogging server https://mastodon.social PHP API

Mastodon REST API Document https://docs.joinmastodon.org

## API Spec
PHP 7.1+

### Test Spec
PHP 7.2+  
Mastodon v2.9.2

## How to use
```php
// require MastodonApi autoload.php
require_once '{Your Server Path}/MastodonApi/autoload.php';

// set mastodon app data
$params = [
	'url'=>'{Mastodon URL : Ex. https://mastodon.manana.kr}',
	'redirect_uri'=>'{Your App Redirect Uri}',
	'scopes'=>['{Your App Scopes}']

	// App Regiter After
	'client_id'=>'{Your App Client Id}',
	'client_secret'=>'{Your App Client Secret}',

	// App Get access_token After
	'access_token'=>'{Your App access_token}'
];
$config = new \MastodonApi\MastodonApiConfig($params);
$mastodonApi = new \MastodonApi\MastodonApi($config);
```

### Step 1. Register Your App
```php
// require MastodonApi autoload.php
require_once '{Your Server Path}/MastodonApi/autoload.php';

// set mastodon app data
$params = [
	'url'=>'{Mastodon URL : Ex. https://mastodon.manana.kr}',
	'redirect_uri'=>'{Your App Redirect Uri}',
	'scopes'=>['{Your App Scopes}']
];
$config = new \MastodonApi\MastodonApiConfig($params);
$mastodonApi = new \MastodonApi\MastodonApi($config);

// set apps request
$appsRequest = new \MastodonApi\Apps\AppsRequest();
$appsRequest->client_name = '{Your Client Name}';
$appsRequest->website = '{Your Website}';

// get apps response
$response = $mastodonApi->apps->apps($appsRequest);
```

### Step 2 - 1. Get access_token - grant_type : authorization_code
```php
// require MastodonApi autoload.php
require_once '{Your Server Path}/MastodonApi/autoload.php';

// set mastodon app data
$params = [
	'url'=>'{Mastodon URL : Ex. https://mastodon.manana.kr}',
	'redirect_uri'=>'{Your App Redirect Uri}',
	'scopes'=>['{Your App Scopes}']

	// GET Step 1. Response Data
	'client_id'=>'{Your App Client Id}',
	'client_secret'=>'{Your App Client Secret}',
];
$config = new \MastodonApi\MastodonApiConfig($params);
$mastodonApi = new \MastodonApi\MastodonApi($config);

// get authorize URL
$url = $mastodonApi->oauth->authorize();

// use a tag
echo '<a href="' . $url . '">Authorize</a>';
```

#### Callback Page
```php
// require MastodonApi autoload.php
require_once '{Your Server Path}/MastodonApi/autoload.php';

// set mastodon app data
$params = [
	'url'=>'{Mastodon URL : Ex. https://mastodon.manana.kr}',
	'redirect_uri'=>'{Your App Redirect Uri}',
	'scopes'=>['{Your App Scopes}']

	// GET Step 1. Response Data
	'client_id'=>'{Your App Client Id}',
	'client_secret'=>'{Your App Client Secret}',
];
$config = new \MastodonApi\MastodonApiConfig($params);
$mastodonApi = new \MastodonApi\MastodonApi($config);

// get parameter check
if (isset($_GET['code']))
{
	// set return data
	$tokenRequest = new \MastodonApi\Oauth\Token\Request();
	$tokenRequest->code = $_GET['code'];
	$tokenRequest->grant_type = 'authorization_code';

	// get access token
	$response = $mastodonApi->oauth->token($tokenRequest);
}
```

### Step 2 - 2. Get access_token - grant_type : password
```php
// require MastodonApi autoload.php
require_once '{Your Server Path}/MastodonApi/autoload.php';

// set mastodon app data
$params = [
	'url'=>'{Mastodon URL : Ex. https://mastodon.manana.kr}',
	'redirect_uri'=>'{Your App Redirect Uri}',
	'scopes'=>['{Your App Scopes}']

	// GET Step 1. Response Data
	'client_id'=>'{Your App Client Id}',
	'client_secret'=>'{Your App Client Secret}',
];
$config = new \MastodonApi\MastodonApiConfig($params);
$mastodonApi = new \MastodonApi\MastodonApi($config);

// set token request
$tokenRequest = new \MastodonApi\Oauth\Token\Request();
$tokenRequest->grant_type = 'password';
$tokenRequest->username = '{Mastodon Login E-Mail}';
$tokenRequest->password = '{Mastodon Login Password}';

// get access token
$response = $mastodonApi->oauth->token($tokenRequest);
```

### Step 3. Enjoy Use MastodonApi
```php
// require MastodonApi autoload.php
require_once '{Your Server Path}/MastodonApi/autoload.php';

// set mastodon app data
$params = [
	'url'=>'{Mastodon URL : Ex. https://mastodon.manana.kr}',

	// GET Step 2. Response Data
	'access_token'=>'{Your App access_token}'
];
$config = new \MastodonApi\MastodonApiConfig($params);
$mastodonApi = new \MastodonApi\MastodonApi($config);
```

## Response Class
```php
MastodonApi\Curl\Curl Object
(
    [method:MastodonApi\Curl\Curl:private] => 
    [url:MastodonApi\Curl\Curl:private] => 
    [options:MastodonApi\Curl\Curl:private] => Array
        (
        )

    [requestHeader:MastodonApi\Curl\Curl:private] => Array
        (
            [0] => Content-Type: application/json
        )

    [contentType:MastodonApi\Curl\Curl:private] => application/json
    [data] => 
    [responseData] => 
    [response] => MastodonApi\Curl\Response Object
        (
            [url] => 
            [contentType] => 
            [httpCode] => 0
            [headerSize] => 0
            [requestSize] => 0
            [sslVerifyResult] => 0
            [redirectCount] => 0
            [totalTime] => 0
            [namelookupTime] => 0
            [connectTime] => 0
            [pretransferTime] => 0
            [sizeUpload] => 0
            [sizeDownload] => 0
            [speedDownload] => 0
            [speedUpload] => 0
            [downloadContentLength] => -1
            [uploadContentLength] => -1
            [starttransferTime] => 0
            [redirectTime] => 0
            [redirectUrl] => 
            [primaryIp] => 
            [certinfo] => Array
                (
                )

            [primaryPort] => 0
            [localIp] => 
            [localPort] => 0
        )

    [error] => MastodonApi\Curl\Error Object
        (
            [code] => 
            [message] => 
        )

)
```

### Use Data Class
```php
var_dump($response->data);
```

### Original Response Data Array
```php
var_dump($response->responseData);
```

## API Document
https://mastodon-api.manana.kr

## Test Mastodon
https://mastodon.manana.kr/