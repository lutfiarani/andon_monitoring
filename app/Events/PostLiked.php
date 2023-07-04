<?php

namespace AppEvents;
use IlluminateQueueSerializesModels;
use IlluminateFoundationEventsDispatchable;
use IlluminateBroadcastingInteractsWithSockets;
use IlluminateContractsBroadcastingShouldBroadcastNow;
class PostLiked implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $username;
    public $message;
/**
* Create a new event instance.
*
* @return void
*/
    public function __construct($username)
    {
    $this->username = $username;
    $this->message = "{$username} liked your status";
    }
/**
* Get the channels the event should broadcast on.
*
* @return Channel|array
*/
    public function broadcastOn()
    {
    return ['post-liked'];
    }
}