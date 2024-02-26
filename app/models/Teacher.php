<?php
require_once 'app/models/BaseModel.php';
function getListTeacher() {
    $sql = "select * from teacher";
    return loadAllRows([],$sql);
}
?>