<?php

namespace rafisa\lib\src\socket;

/**
 * Description of SocketTypes
 *
 * @author d.peters
 */
class SocketType
{
    const STREAM = SOCK_STREAM;

    const DATAGRAM = SOCK_DATAGRAM;

    const SEQ_PACKET = SOCK_SEQPACKET;

    const RAW = SOCK_RAW;

    const RDM = SOCK_RDM;
}
