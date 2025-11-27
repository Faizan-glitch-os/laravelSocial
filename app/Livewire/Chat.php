<?php

namespace App\Livewire;

use App\Events\ChatEvent;
use Livewire\Component;

class Chat extends Component
{
    public $textvalue = '';
    public $chatLog = [];

    public function getListeners()
    {
        return ['echo-private:chatchannel.ChatEvent' => 'notifyNewMessage'];
    }

    public function notifyNewMessage($message)
    {
        array_push($this->chatLog, $message['chat']);
    }

    public function send()
    {
        if (!auth('web')->check()) abort(403, 'Unauthorized');

        if (trim(strip_tags($this->textvalue)) == '') {
            return;
        }

        array_push(
            $this->chatLog,
            [
                'selfmessage' => true,
                'id' => auth('web')->user()->id,
                'username' => auth('web')->user()->username,
                'avatar' => auth('web')->user()->avatar,
                'textvalue' => strip_tags($this->textvalue)
            ]
        );
        broadcast(new ChatEvent([
            'selfmessage' => false,
            'id' => auth('web')->user()->id,
            'username' => auth('web')->user()->username,
            'avatar' => auth('web')->user()->avatar,
            'textvalue' => strip_tags($this->textvalue)
        ]))->toOthers();

        $this->textvalue = '';
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
