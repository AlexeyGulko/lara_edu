<?php

if (! function_exists('flashMessage')) {

    /**
     * @param string $message
     * @param string $type
     */
    function flashMessage(string $message, string $type = 'success') {
        session()->flash('message', $message);
        session()->flash('message_type', $type);
    }
}
