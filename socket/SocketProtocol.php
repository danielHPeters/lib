<?php

namespace rafisa\lib\src\socket;

/**
 * Description of SocketProtocols
 *
 * @author d.peters
 */
class SocketProtocol
{
    final public static function ICMP()
    {
        return getprotobyname('icmp');
    }

    final public static function UDP()
    {
        return getprotobyname('udp');
    }

    final public static function TCP()
    {
        return getprotobyname('udp');
    }
}
