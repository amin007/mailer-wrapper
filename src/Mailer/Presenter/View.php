<?php
namespace NazrolTech\Mailer\Presenter;
use Illuminate\Filesystem\Filesystem;
use NazrolTech\Mailer\Exceptions\ViewNotFoundException;

/**
 * Created by PhpStorm.
 * User: Tajul
 * Date: 9/23/2016
 * Time: 12:43 AM
 */

class View  {

    private $view;
    private $data;
    private $resolver;


    public function setVariableToView(array $data) {
        $this->data = $data;
    }

    public function setViewResolver($resolver) {
        $this->resolver = $resolver;
    }

    /**
     * @return view
     */
    public function getView() {
        return $this->view;
    }


    public function getViewResolver() {
        return $this->resolver;
    }


    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }


}