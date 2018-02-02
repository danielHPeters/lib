<?php

namespace rafisa\lib\socket;

/**
 * Description of SocketProtocols
 *
 * @author Daniel Peters
 * @version 1.0
 * @package rafisa\lib\socket
 */
class SocketProtocol
{
    /**
     * @return int
     */
    final public static function ICMP(): int
    {
        return getprotobyname('icmp');
    }

    /**
     * @return int
     */
    final public static function UDP(): int
    {
        return getprotobyname('udp');
    }

    /**
     * @return int
     */
    final public static function TCP(): int
    {
        return getprotobyname('tcp');
    }
}
