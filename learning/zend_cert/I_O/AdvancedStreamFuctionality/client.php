<?php

$clientSocket = stream_socket_client('tcp://0.0.0.0:1037');
stream_filter_append($clientSocket, 'zlib.inflate');
while (!feof($clientSocket)) {
    echo fread($clientSocket, 100);
}
fclose($clientSocket);