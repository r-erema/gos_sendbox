<?php

$serverSocket = stream_socket_server('tcp://0.0.0.0:1037');

while ($connection = stream_socket_accept($serverSocket)) {
    stream_filter_append($connection, 'string.toupper');
    stream_filter_append($connection, 'zlib.deflate');
    fwrite($connection, 'Hello World' . PHP_EOL);
    fclose($connection);
}
fclose($serverSocket);