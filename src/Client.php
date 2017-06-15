<?php
/**
 */

namespace Dspacelabs\Component\Ecwid;

/**
 * Ecwid Client
 */
class Client
{
    /**
     * Client ID
     *
     * @param string
     */
    protected $clientId;

    /**
     * Client Secret
     *
     * @param string
     */
    protected $clientSecret;

    /**
     * @param string $id
     * @param string $secret
     */
    public function __construct($clientId, $clientSecret)
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->scopes       = array();
    }

    /**
     * @return string
     */
    protected function getBaseAPIUri()
    {
        return 'https://my.ecwid.com/api';
    }

    /**
     * @param string $code
     * @param string $redirectUri
     */
    public function getAccessToken($code, $redirectUri)
    {
        $url = sprintf(
            '%s/oauth/token?client_id=%s&client_secret=%s&code=%s&redirect_uri=%s&grant_type=authorization_code',
            $this->getBaseAPIUri(),
            $this->clientId,
            $this->clientSecret,
            $code,
            urlencode($redirectUri)
        );
        var_dump($url);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
