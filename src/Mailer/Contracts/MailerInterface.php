<?php

namespace NazrolTech\Mailer\Contracts;

/**
 * Created by PhpStorm.
 * User: Tajul
 * Date: 9/23/2016
 * Time: 12:35 AM
 */

interface Mailerinterface {

    public function instantSend();
    public function queue();
    public function sendWithDefer();

}