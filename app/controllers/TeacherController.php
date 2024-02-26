<?php
include_once 'app/models/Teacher.php';
include_once 'app/controllers/BaseController.php';
function getTeacher() {
    $teachers = getListTeacher();
    return render('teacher.index',compact('teachers'));
}