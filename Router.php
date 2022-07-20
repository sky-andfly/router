<?php
class Router
{
    protected array $path = [];
    protected array $title = [];
    protected string $notFoundPage;
    protected string $notFoundTitle;

    public function setRout($path, $include, $title): void
    {
        $this->path += [$path => $include];
        $this->title += [$path => $title];
    }
    public function getPage()
    {
        if(array_key_exists($_SERVER['REQUEST_URI'], $this->path)){
            return $this->path[$_SERVER['REQUEST_URI']];
        }else{
            return $this->notFoundPage;
        }
    }
    public function getTitle()
    {
        if(array_key_exists($_SERVER['REQUEST_URI'], $this->title)){
            return $this->title[$_SERVER['REQUEST_URI']];
        }else{
            return  $this->notFoundTitle;
        }
    }
    public function setNotFoundPage($notFoundPage, $notFoundTitle): void
    {
        $this->notFoundPage = $notFoundPage;
        $this->notFoundTitle = $notFoundTitle;
    }


}