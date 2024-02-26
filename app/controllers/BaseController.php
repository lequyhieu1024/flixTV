<?php
include_once 'vendor/eftec/bladeone/lib/BladeOne.php';
use eftec\bladeone\BladeOne;
function render($viewFile, $data = []){
        $viewDir = "./app/views";
        $storageDir = "./storage";
        $blade = new BladeOne($viewDir,$storageDir, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
}

?>