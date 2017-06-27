<?php
/**
 */

namespace Dspacelabs\Component\Ecwid;

use Dspacelabs\Component\Http\Client\Client as BaseClient;
use Dspacelabs\Component\Http\Message\Uri;
use Dspacelabs\Component\Http\Message\Request;

/**
 * Ecwid Client
 */
class Client extends BaseClient
{
    /**
     * Client ID
     *
     * @var string
     */
    protected $clientId;

    /**
     * Client Secret
     *
     * @var string
     */
    protected $clientSecret;

    /**
     * Store ID
     *
     * @var string
     */
    protected $storeId;

    /**
     * @param string $id
     * @param string $secret
     */
    public function __construct($clientId, $clientSecret, $storeId = '')
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->storeId      = $storeId;
    }

    /**
     * Set the Store ID you are working with
     *
     * @param string $storeId
     * @return self
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;

        return $this;
    }

    /**
     * @param string $code
     * @param \Psr\Http\Message\UriInterface $redirectUri
     * @return array
     */
    public function getAccessToken($code, \Psr\Http\Message\UriInterface $redirectUri)
    {
        $uri = (new Uri('https://my.ecwid.com/api/oauth/token'))
            ->withQuery(
                http_build_query(
                    array(
                        'client_id'     => $this->clientId,
                        'client_secret' => $this->clientSecret,
                        'code'          => $code,
                        'redirect_uri'  => $redirectUri,
                        'grant_type'    => 'authorization_code',
                    )
                )
            );
        $request  = (new Request())->withMethod('POST')->withUri($uri);
        $response = $this->sendWithRequest($request);
        $contents = $response->getBody()->getContents();
        $data     = json_decode($contents, true);
        if (!$data) {
            //throw new \RuntimeException('There was an error with the request');
        }

        return $response;

        return $data;
    }
}
