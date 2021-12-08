<?php
namespace App;
class View {
    public static function renderHeader()
    {
        require_once($_SERVER["DOCUMENT_ROOT"] . '/view/header.php');
    }

    public static function renderFooter()
    {
        require_once($_SERVER["DOCUMENT_ROOT"] . '/view/footer.php');
    }

    public static function render($fileName, $result = false)
    {
        require($_SERVER["DOCUMENT_ROOT"] . '/view/pages/' . $fileName);
    }

    public static function renderJSON($result = false)
    {
        ob_end_clean();
        echo json_encode($result);
        die;
    }
}