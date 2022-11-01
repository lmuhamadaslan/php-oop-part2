<?php

class DBController
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $database = 'crud_php';
    protected $conn;

    public function __construct()
    {
        $this->conn = $this->connectDB();
    }

    public function connectDB()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            return $conn;
        }
    }

    // runBaseQuery() digunakan untuk menjalankan query yang tidak mengembalikan nilai
    public function runBaseQuery($query)
    {
        $result = $this->conn->query($query);
        if ($result == false) {
            return false;
        } else {
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    // runQuery() digunakan untuk menjalankan query yang mengembalikan nilai
    public function runQuery($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->get_result();

        if ($result == false) {
            return false;
        } else {
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        return $rows;
    }

    // bindQueryParams() digunakan untuk mengikat parameter pada query
    public function bindQueryParams($sql, $param_type, $param_value_array)
    {
        $param_value_reference[] = &$param_type;
        for ($i = 0; $i < count($param_value_array); $i++) {
            $param_value_reference[] = &$param_value_array[$i];
        }
        call_user_func_array(array(
            $sql,
            'bind_param'
        ), $param_value_reference);
    }

    // insert() digunakan untuk memasukkan data ke dalam database
    public function insert($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $insert_id = $sql->insert_id;
        return $insert_id;
    }

    // update() digunakan untuk memperbarui data di dalam database
    public function update($query, $param_type, $param_value_array)
    {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
    }
}
