<?php
session_start();

require_once 'env.php';
require_once 'app/controllers/TeacherController.php';
echo getTeacher();
