<h1>Furgonetka REST API PHP</h1>

Source: <a href="https://furgonetka.pl/api/rest" target="_blank">Furgonetka REST API Docs</a>  
API Version compatible: v1.0.21    
Docs: <a href="https://kwarcek.github.io/furgonetka-docs/">Link to documentation</a>

<h2>Basic usage</h2>
<h3>Installation</h3>
```
composer require kwarcek/furgonetka-rest-api-php
```
<h3>Authorization</h3>
```
use Kwarcek\FurgonetkaRestApi\FurgonetkaClient
use Kwarcek\FurgonetkaRestApi\AuthCredential

$credentials = new LoginCredential();
$credentials->clientSecret = 'app-e781f17b79aaf0d1a44lh88469c9f6e5';
$credentials->clientId = 'b4db4de51e51371ad817f36ac3dd4e760b659g246ee3b3f67d3add846479436f';
$credentials->username = 'user@example.com';
$credentials->password = 'secret123';

$client = new FurgonetkaClient($credentials);
```

<h3>Get API access token</h3>
````
$credentials = $client->authCredential->accessToken;
````

<h3>Get carrier list</h3>
```
$carrierList = $client->account()->getCarrierList();
```

<h2>Donate</h2>
<p><img src="https://cdn.jsdelivr.net/gh/atomiclabs/cryptocurrency-icons@9ab8d6934b83a4aa8ae5e8711609a70ca0ab1b2b/svg/color/btc.svg" alt="btc" onerror="iconLoadError(this)">  BTC: 12iNBSSznWNYKwyPC6nrBBQVMNc638QheD</p>
<p><img src="https://cdn.jsdelivr.net/gh/atomiclabs/cryptocurrency-icons@9ab8d6934b83a4aa8ae5e8711609a70ca0ab1b2b/svg/color/eth.svg" alt="eth" onerror="iconLoadError(this)"> ETH (ERC20): 0x286909e74cca47cf70f4b2d713054d8c85d192e6</p>
<p><img src="https://cdn.jsdelivr.net/gh/atomiclabs/cryptocurrency-icons@9ab8d6934b83a4aa8ae5e8711609a70ca0ab1b2b/svg/color/etc.svg" alt="etc" onerror="iconLoadError(this)"> ETC: 0x286909e74cca47cf70f4b2d713054d8c85d192e6</p>
<p><img src="https://cdn.jsdelivr.net/gh/atomiclabs/cryptocurrency-icons@9ab8d6934b83a4aa8ae5e8711609a70ca0ab1b2b/svg/color/bnb.svg" alt="bnb" onerror="iconLoadError(this)"> BNB (ERC20): 0x286909e74cca47cf70f4b2d713054d8c85d192e6</p>  
<p><img src="https://cdn.jsdelivr.net/gh/atomiclabs/cryptocurrency-icons@9ab8d6934b83a4aa8ae5e8711609a70ca0ab1b2b/svg/color/doge.svg" alt="bnb" onerror="iconLoadError(this)"> DOGE: DK513TpCYaCPABkFPshYhYKi2UoiwraVGF</p>

<b style="padding-top: 10px;">Feel free to contribute to the project.</b>

