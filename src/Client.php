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
    public function __construct($id, $secret)
    {
        $this->id     = $id;
        $this->secret = $secret;
        $this->scopes = array();
    }

    /**
     * @return string
     */
    protected function getBaseAPIUri()
    {
        return 'https://my.ecwid.com/api';
    }
}
