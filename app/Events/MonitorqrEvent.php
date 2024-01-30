<?php

namespace App\Events;

use auth;
use App\Models\User;
use App\Models\Qrtoken;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MonitorqrEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $status;
    public $message;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($status, $message)
    {
        $this->status = $status;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('absensi');
    }
    public function broadcastWith(): array
{

    $token = Qrtoken::first();
    $user = User::where('id', auth()->user()->id)->first();
    return ['id' => $token->token,
            'nama' => $user->name,
            'status' => $this->status,
            'message'=> $this->message
            

];
}
}
