<?php

namespace rafisa\lib\database;

/**
 * Description of DbConfiguration
 *
 * @author  d.peters
 * @version 1.0
 */
class DbConfiguration
{
    /**
     *
     * @var string
     */
    private $host;

    /**
     *
     * @var string
     */
    private $db;

    /**
     *
     * @var string
     */
    private $user;

    /**
     *
     * @var string
     */
    private $password;

    /**
     *
     * @var int
     */
    private $port;

    /**
     *
     * @param string $host
     * @param string $db
     * @param string $user
     * @param string $password
     */
    public function __construct(string $host, string $db, string $user = null, string $password = null)
    {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     *
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     *
     * @return string
     */
    public function getDb(): string
    {
        return $this->db;
    }

    /**
     *
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     *
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     *
     * @param string $host
     */
    public function setHost(string $host)
    {
        $this->host = $host;
    }

    /**
     *
     * @param string $db
     */
    public function setDb(string $db)
    {
        $this->db = $db;
    }

    /**
     *
     * @param string $user
     */
    public function setUser(string $user)
    {
        $this->user = $user;
    }

    /**
     *
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     *
     * @param int $port
     */
    public function setPort(int $port)
    {
        $this->port = $port;
    }
}
