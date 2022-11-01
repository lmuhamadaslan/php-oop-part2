<?php
require_once("config/DBController.php");
require_once("model/student.php");

$action = "";

if (!empty($_GET["action"])) {
    $action = $_GET["action"];
}

switch ($action) {
    case 'add-student':
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $dob = "";
            if ($_POST['dob']) {
                $dob_timestamp = strtotime($_POST['dob']);
                $dob = date("Y-m-d", $dob_timestamp);
            }
            $class = $_POST['class'];

            $student = new Student();
            $insert_id = $student->addStudent($name, $email, $dob, $class);
            header("Location: index.php");
        }
        require_once("view/add-student.php");
        break;

    case 'edit-student':
        $student_id = $_GET['id'];
        $student = new Student();
        
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $dob = "";
            if ($_POST['dob']) {
                $dob_timestamp = strtotime($_POST['dob']);
                $dob = date("Y-m-d", $dob_timestamp);
            }
            $class = $_POST['class'];

            $student->editStudent($name, $email, $dob, $class, $student_id);
            header("Location: index.php");
        }
        $result = $student->getStudent($student_id);
        require_once("view/edit-student.php");
        break;

    case 'delete-student':
        $student_id = $_GET['id'];
        $student = new Student();
        $student->deleteStudent($student_id);

        $result = $student->getStudent();
        require_once("view/student.php");
        break;

    default:
        $student = new Student();
        $result = $student->getStudent();
        require_once("view/student.php");
}
