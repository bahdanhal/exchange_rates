<?php
namespace Controllers;
use \App\View;
abstract class Controller{
    public function execute()
    {
        View::renderHeader();
        $this->content();
        View::renderFooter();
    }

    public function content()
    {

    }
}