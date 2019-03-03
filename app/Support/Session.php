<?php

namespace App\Support;

use Expotition\Messages\Messages;

class Session
{
    /**
     * @param bool $as_object
     * @param bool $delete
     * @return Messages|array
     */
    public static function getMessages($as_object = false, $delete = false)
    {
        $messages = session('messages', []);

        if ($delete) {
            self::clearMessages();
        }

        if ($as_object) {
            return new Messages($messages);
        }

        return $messages;
    }

    public static function setMessages(Messages $messages): void
    {
        session()->push('messages', $messages->toArray());
    }

    public static function clearMessages(): void
    {
        session()->forget('messages');
    }
}
