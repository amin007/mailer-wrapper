<?php
namespace NazrolTech\Mailer;

use NazrolTech\Mailer\Contracts\Mailerinterface;
use NazrolTech\Mailer\Presenter\View;
use Illuminate\Mail\Mailer;
use Psy\Exception\RuntimeException;

/**
 * Created by PhpStorm.
 * User: Tajul
 * Date: 9/23/2016
 * Time: 12:41 AM
 */

class MailerBuilder implements Mailerinterface {

    /**
     * sent to
     * @var
     */
    protected $sentTo;

    /**
     * subject
     * @var
     */
    protected $subject;
    protected $cc;
    protected $sender;
    protected $viewPath;
    protected $view;
    protected $mailer;
    protected $ccAble;

    public function __construct(Mailer $mailer,View $view)
    {
        $this->view = $view;
        $this->mailer = $mailer;
    }

    /**
     * @param $viewPath
     * @return $this
     */
    public function setView($viewPath) {
        $this->view->setViewResolver($viewPath);
        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setVariable($data = []) {
        $this->view->setVariableToView($data);
        return $this;
    }

    /**
     * @param $sentTo
     * @return $this
     */
    public function setSentTo($sentTo) {
        $this->sentTo = $sentTo;
        return $this;
    }

    /**
     * @param $sender
     * @return $this
     */
    public function setSender($sender) {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @param $subject
     * @return $this
     */
    public function setSubject($subject) {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @param bool $ccAble
     */
    public function setCcable($ccAble = false) {
        $this->ccAble = $ccAble;
    }

    /**
     * @param $cc
     * @return $this
     */
    public function setCc($cc) {
        $this->cc = $cc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSentTo()
    {
        return $this->sentTo;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return mixed
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }


    /**
     * @return mixed
     */
    public function instantSend()
    {
            $this->mailer->send($this->view->getViewResolver(),$this->view->getData(),function($mailer){
                $mailer->to($this->getSentTo());
                $mailer->sender('from@mailtrap.io');
                $mailer->subject($this->getSubject());
        });
    }

    /**
     *
     */
    public function instandSendWithCc() {
        if(!$this->ccAble) {
            throw new RuntimeException();
        }

        $this->mailer->send($this->view->getViewResolver(),$this->view->getData(),function($mailer){
            $mailer->to($this->getSentTo());
            $mailer->sender('from@mailtrap.io');
            $mailer->cc($this->getCc());
            $mailer->subject($this->getSubject());
        });
    }

    /**
     * @return mixed
     */
    public function queue()
    {
        // TODO: Implement queue() method.
    }

    /**
     * @return mixed
     */
    public function sendWithDefer()
    {
        // TODO: Implement sendWithDefer() method.
    }


}