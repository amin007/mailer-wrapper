<?php
namespace NazrolTech\Mailer\Presenter;
use Illuminate\Filesystem\Filesystem;
use NazrolTech\Mailer\Exceptions\ViewNotFoundException;

class View  {

    protected $fileSystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->fileSystem = $filesystem;
    }

    /**
     * View passing arguements
     * @var
     */
    private $data;

    /**
     * View Resolver
     * @var
     */
    private $resolver;

    /**
     * set passing data to view
     * @param array $data
     */
    public function setVariableToView(array $data) {
        $this->data = $data;
    }

    /**
     * @param $resolver
     * @throws ViewNotFoundException
     */
    public function setViewResolver($resolver) {
        $translatePath = str_replace('.','/',$resolver);
        if(!$this->fileSystem->exists($this->loadViewPath().DIRECTORY_SEPARATOR.$translatePath)) {
            throw new ViewNotFoundException();
        }
        $this->resolver = $resolver;
    }

    /**
     * Load view path based on config laravel
     * @return mixed
     */
    private function loadViewPath() {
        return config('view.path');
    }

    /**
     * get View
     * @return View
     */
    public function getViewResolver() {
        return $this->resolver;
    }


    /**
     * get Passing data
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }


}