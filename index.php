<?php 
require_once("controller/Student.php");

if ($action == ""){
    require_once("view/student.php");
} else if ($action == 'add-student'){
    require_once("view/add-student.php");
} else if ($action == 'edit-student'){
    require_once("view/edit-student.php");
} else if ($action == 'student-delete'){
    require_once("view/student.php");
} else {
    require_once("view/student.php");
}
