<?php
namespace NazrolTech\Mailer\Base;


use Illuminate\Mail\Mailer;
use NazrolTech\Mailer\Presenter\View;

/**
 * Created by PhpStorm.
 * User: Tajul
 * Date: 9/23/2016
 * Time: 12:37 AM
 */

class BaseMailer{

    protected $mailer;
    protected $view;

    public function __construct(Mailer $mailer,View $view)
    {
        $this->mailer = $mailer;
        $this->view = $view;
    }


}