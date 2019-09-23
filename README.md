<img src="https://www.sipgatedesign.com/wp-content/uploads/wort-bildmarke_positiv_2x.jpg" alt="sipgate logo" title="sipgate" align="right" height="112" width="200"/>

# sipgate.io php basic auth example

To demonstrate how to authenticate against the sipgate REST API using HTTP Basic Auth, we query the `/account` endpoint which provides basic account information.

For further information regarding sipgate REST API please visit https://api.sipgate.com/v2/doc

### Prerequisites

-   [composer](https://getcomposer.org)
-   php >= 7.0

### How to use

Navigate to the project's root directory.

Install dependencies manually or use your IDE's import functionality:

```bash
$ composer install
```

In order to run the code you have to set the following variables in [BasicAuth.php](src/BasicAuth.php):

```php
$username = "YOUR_SIPGATE_EMAIL";
$password = "YOUR_SIPGATE_PASSWORD";
```

Run the application:

```bash
$ php -f src/BasicAuth.php
```

### How it works

The sipgate REST API is available under the following base URL:

```php
protected static $BASE_URL = "https://api.sipgate.com/v2/";
```

The API expects request data in JSON format. Thus the `Content-Type` header needs to be set accordingly. You can achieve that by using the `withHeaders` method from the `Zttp` library.

```php
protected function send(): ZttpResponse
{
    return Zttp::withHeaders([
            "Accept" => "application/json",
            "Content-Type" => "application/json"
        ])
        ->withBasicAuth($this->username, $this->password)
        ->get(self::$BASE_URL . "/account",);
}
```


We use the package `Zttp` for request generation and execution. Headers and authorization header  are generated from `withHeaders` and `withBasicAuth` methods respectively. The request URL consists of the base URL defined above and the endpoint `/account`. The method `withBasicAuth` from the `Zttp` package takes credentials and generates the required Basic Auth header (for more information on Basic Auth see our [code example](https://github.com/sipgate-io/sipgateio-basicauth-java)).

> If OAuth should be used for `Authorization` instead of Basic Auth we do not use the `withBasicAuth(username, password)` method. Instead we set the authorization header to `Bearer` followed by a space and the access token: `Zttp::withHeaders(["Authorization" => "Bearer " . accessToken])`. For an example application interacting with the sipgate API using OAuth see our [sipgate.io Java Oauth example](https://github.com/sipgate-io/sipgateio-oauth-java).

### Basic Auth
Basic access authentication (Basic Auth) is an easy to use, well known, and well supported authentication method. 
You can find a lot of documentation about this authentication method on the internet, e.g: [Wikipedia](https://en.wikipedia.org/wiki/Basic_access_authentication) or [RFC 2617](https://www.ietf.org/rfc/rfc2617.txt).

To use Basic Auth, you simply have to provide an Authorization header with each request. 
The header uses the keyword `Basic` followed by a space and a credentials string. 
The credentials string is `username:password` Base64-encoded.

For example, if your username is `John` and your password is `topsecret`, 
your plaintext credentials string would be `John:topsecret`. 
The Base64-encoded string would be `Sm9objp0b3BzZWNyZXQ=`.

The complete header would look like:

`Authorization: Basic Sm9objp0b3BzZWNyZXQ=`


### Common Issues

#### HTTP Errors
| reason | errorcode |
| ------------- |:-------------:|
| username and/or password are wrong | 401 |
| credentials not Base64-encoded | 401 |
| wrong REST API endpoint | 404 |
| wrong request method | 405 |


### Related

- [sipgate team FAQ (DE)](https://teamhelp.sipgate.de/hc/de)
- [sipgate basic FAQ (DE)](https://basicsupport.sipgate.de/hc/de)

### Contact Us

Please let us know how we can improve this example.
If you have a specific feature request or found a bug, please use **Issues** or fork this repository and send a **pull request** with your improvements.

### License

This project is licensed under **The Unlicense** (see [LICENSE file](./LICENSE)).

### External Libraries

This code uses the following external libraries

- Zttp:
  - Licensed under the [MIT License](https://opensource.org/licenses/MIT)
  - Website: [https://github.com/kitetail/zttp](https://github.com/kitetail/zttp)

---

[sipgate.io](https://www.sipgate.io) | [@sipgateio](https://twitter.com/sipgateio) | [API-doc](https://api.sipgate.com/v2/doc)
