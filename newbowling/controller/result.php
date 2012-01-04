<?php

$currentDir = dirname(__FILE__);

require_once $currentDir . '/../model/Bowling.class.php';


try {
    $bowling = new Bowling($_POST['userNames']);
    $bowling->setResult();
    require_once $currentDir . '/../view/resultTemplate.php';

} catch (Exception $e) {
    $errorMessages[] = $e->getMessage();
    require_once $currentDir . '/../view/formTemplate.php';
}
