<?php
namespace Controllers;
use App\View;
use Models\RateModel;
class RateController extends Controller{

    public function content()
    {
        $rateModel = new RateModel;

        View::renderJSON($rateModel->process());
    }
}