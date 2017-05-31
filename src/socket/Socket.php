<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\socket;

use Exception;

/**
 * Description of Socket
 *
 * @author d.peters
 */
class Socket {

    /**
     * The socket descriptor
     * @var type 
     */
    private $descriptor;

    /**
     * 
     * @param int $domain
     * @param int $type
     * @param int $protocol
     * @throws Exception called when failed to create socket
     */
    public function __construct(int $domain, int $type, int $protocol = 0) {

        $this->descriptor = socket_create($domain, $type, $protocol);

        if (!$this->descriptor) {

            $this->handleError('Failed to create the socket');
        }
    }

    /**
     * 
     */
    private function handleError(string $message) {
        $err = $this->getLastError();
        throw new Exception($message . ': [' . $err['code'] . '] ' . $err['message']);
    }

    /**
     * 
     * @return type
     */
    private function getLastError() {
        
        $errCode = socket_last_error();
        $errMsg = socket_strerror($errCode);

        $err = ['code' => $errCode, 'message' => $errMsg];

        return $err;
    }

    /**
     * 
     * @param string $address
     * @param type $port
     */
    public function connectToRemote(string $address, $port = 80) {

        $connected = socket_connect($this->descriptor, $address, $port);

        if (!$connected) {

            $this->handleError('Could not connct to ' . $address);
        }
    }
    
    /**
     * 
     * @param string $address
     * @param type $port
     */
    public function bind(string $address = '127.0.0.1', $port = 5000){
        
        $bound = socket_bind($this->descriptor, $address, $port);
        
        if(!$bound){
            $this->handleError('Failed to bind socket');
        }
    }
    
    /**
     * 
     * @param type $backlog
     */
    public function listen($backlog = 10){
        socket_listen($this->descriptor, $backlog);
    }

    /**
     * 
     * @param type $data
     * @param type $flags
     */
    public function send($data, $flags = 0) {

        $sent = socket_send($this->descriptor, $data, strlen($data), $flags);

        if (!$sent) {

            $this->handleError('Failed to send data');
        }
    }

    /**
     * close the socket
     */
    public function close() {
        socket_close($this->descriptor);
    }

}
