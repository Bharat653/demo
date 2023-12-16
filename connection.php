<?php

class database
{
    private $db;
    private $_FILES;
    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $this->db = new PDO("mysql:host=$servername;dbname=project", $username, $password);
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function login($data)
    {
        $query = $this->db->prepare("select * from login where name = ? and password = ?");
        $query->execute([$data['name'], $data['password']]);

        // Fetch the result as an associative array
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        }
        return 0;
    }


    function editAdmin($data1)
    {

        $query = $this->db->prepare("update login set  name = :name, password = :password, email = :email, gender = :gender");
        return $query->execute($data1);
        // $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function editphoto($data1)
    {

        $query = $this->db->prepare("update login set image = :image ");
        return $query->execute($data1);
        // $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function categoryfile()
    {
        $categories = $_POST['categories_id'];
        $file_name = $_FILES['file_name']["name"];

        $query = $this->db->prepare("insert into file (categories_id,file_name) values (?,?)");
        $result = $query->execute([$categories, $file_name]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getCategoryfile()
    {
        $query = $this->db->prepare("select  categories_id,file_name,categories_name from file inner join category on file.categories_id = category.id ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function addRegistration()
    {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        $query = $this->db->prepare("insert into user_login(name,email,number,password,gender) values (?,?,?,?,?)");
        $result = $query->execute([$name, $email, $number, $password, $gender]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getRegistration()
    {
        $query = $this->db->prepare("select * from user_login ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getApproval($data1)
    {
        $query = $this->db->prepare("update user_login set status = :status where id =:id");
        return $query->execute($data1);
    }


    function newlogin($data)
    {

        $query = $this->db->prepare("select * from user_login where email = ? and password = ?");
        $query->execute([$data['email'], $data['password']]);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        }
        return 0;
    }

    function approvalfilter($data)
    {
        $query = $this->db->prepare("select * from user_login where status = :status");
        $query->execute($data);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // function add

    function addCategories()
    {
        $categories = $_POST['categories'];
        $query = $this->db->prepare("insert into category(categories_name) values (?)");
        $result = $query->execute([$categories]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getcategory()
    {
        $query = $this->db->prepare("select * from category ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function editcategory($data)
    {
        $query = $this->db->prepare("select * from category where id = :id");
        $query->execute($data);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function updateEdit($data)
    {
        $query = $this->db->prepare("update category set categories_name = :categories_name where id = :categories_id");
        return $query->execute($data);
    }

    function getapprovallist()
    {
        $query = $this->db->prepare("select * from user_login where status = 'approved'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function sharedata($data){
        
        $query = $this->db->prepare("insert into share (file_id,user_id) values (?,?)");
        $query->execute($data);
        
    }
}
$database = new Database();
