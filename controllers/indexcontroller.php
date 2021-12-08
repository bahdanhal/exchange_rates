<?php
namespace Controllers;
use App\View;
class IndexController extends Controller{

    public function content()
    {
        View::render('index.php');
    }
}