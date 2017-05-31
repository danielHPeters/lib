<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\socket;

/**
 * Description of SocketProtocols
 *
 * @author d.peters
 */
class SocketProtocol {

    public static final function ICMP() {

        return getprotobyname('icmp');
    }
    
    public static final function UDP(){
        return getprotobyname('udp');
    }
    
    public static final function TCP(){
        return getprotobyname('udp');
    }

}
