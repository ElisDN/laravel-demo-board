<?php

namespace App\Services\Sms;

interface SmsSender
{
    public function send($number, $text): void;
}