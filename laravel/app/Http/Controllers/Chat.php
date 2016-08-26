<?php

namespace App\Http\Controllers;


use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {

    private $clients;
    private $subscriptions;
    private $users;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage();
        $this->subscriptions = [];
        $this->users = [];
    }
    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        $this->users[$conn->resourceId] = $conn;
    }

    public function onMessage(ConnectionInterface $conn, $msgs)
    {

        $data = json_decode($msgs);

        switch($data)
        {
            case "subscribe":
                $this->subscriptions[$conn->resourceId] = $data->channel;
                break;

            case "message":
                if(isset($this->subscriptions[$conn->resourceId]))
                {
                    $target = $this->subscriptions[$conn->resourcId];

                    foreach($this->subscriptions as $key => $channel)
                    {
                        if($channel == $target && $key != $conn->resourceId)
                        {
                            $this->users[$key]->send($data->message);
                        }
                    }
                }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        unset($this->users[$conn->resourceId]);
        unset($this->subscriptions[$conn->resourceId]);
    }

    public  function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occured: {$e->getMessage()}\n";
        $conn->close();
    }
}