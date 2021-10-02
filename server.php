<?php
// Create a new server, listening on IP and port
$server = new Swoole\Server('127.0.0.1', 9501);

// Setup the connection event callback function
$server->on('Connect', function ($server, $fd) 
{
    echo "Client: Connect\n";
});

// Setup the receive event callback function
$server->on('Receive', function ($server, $fd, $reactor_id, $data) 
{
    $server->send($fd, "Server: {$data}");
});

// Setup and monitor close events
$server->on('Close', function ($server, $fd) 
{
    echo "Client: Close\n";
});

// Start the Swoole Server and accept requests
$server->start(); 