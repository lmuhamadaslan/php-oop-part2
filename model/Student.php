<?php 
require_once("config/DBController.php");

class Student
{
    private $db_handle;

    public function __construct()
    {
        $this->db_handle = new DBController();
    }

    // addStudent() digunakan untuk menambahkan data siswa
    public function addStudent($name, $email, $dob, $class){
        $query = "INSERT INTO tbl_student (name, email, dob, class) VALUES (?, ?, ?, ?)";
        $paramType = "ssss";
        $paramValue = array(
            $name,
            $email,
            $dob,
            $class
        );

        $insert_id = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insert_id;
    }

    // editStudent() digunakan untuk mengubah data siswa
    public function editStudent($name, $email, $dob, $class, $student_id)
    {
        $query = "UPDATE tbl_student SET name = ?, email = ?, dob = ?, class = ? WHERE id = ?";
        $paramType = "ssssi";
        $paramValue = array(
            $name,
            $email,
            $dob,
            $class,
            $student_id
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    // deleteStudent() digunakan untuk menghapus data siswa
    public function deleteStudent($student_id)
    {
        $query = "DELETE FROM tbl_student WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );

        $this->db_handle->update($query, $paramType, $paramValue);
    }

    public function getStudentById($student_id)
    {
        $query = "SELECT * FROM tbl_student WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );

        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    public function getStudent()
    {
        $query = "SELECT * FROM tbl_student";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
}
