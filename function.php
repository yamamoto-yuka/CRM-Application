<?php

class Users
{
    private $host = 'localhost';
    private $username  = 'root';
    private $password = 'root';
    private $dbName = 'CRM_project';
    private $port = 8889;

    public $conn;
    // Database Connection

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbName, $this->port);

        if (mysqli_connect_error()) {
            trigger_error('Error in DB' . mysqli_connect_error());
        } else {
            return $this->conn;
        }
    }

    public function check_login(){
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";

            $result = $this->conn->query($sql);

            if ($result && $result->num_rows> 0) 
            {
                $user_data = $result->fetch_assoc();
                return $user_data;
            }
                
            }else{
                header("Location: login.php");
                die;
            }
        }
    
        public function login(){
                $name = $_POST['user_name'];
                $password = $_POST['password'];
                
                if (!empty($name) && !empty($password) && !is_numeric($name)) {

                    $sql = "SELECT * FROM users WHERE user_name = '$name' LIMIT 1";
                    $result = $this->conn->query($sql);
            
               
                    if ($result) {
                        if ($result && $result->num_rows> 0) {
                            $user_date = $result->fetch_assoc();
                       
                            if ($user_date['password'] === $password) {
                                $_SESSION['user_id'] = $user_date['user_id'];
                                header("Location: contact.php");
                                die;
                            }
                        }
                    }
            
                    else echo "wrong username or password!";
                } else {
                    echo "wrong username or password!";
                }
            
            
        }

        public function Signup(){
            $name = $_POST['user_name'];
            $password = $_POST['password'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

    
        if (!empty($name) && !empty($password) && !empty($first_name) && !empty($last_name) && !empty($phone) && !empty($address) && !is_numeric($name) && !is_numeric($first_name) && !is_numeric($last_name)) {
        $user_id = $this->random_num(20);
        $sql = "INSERT INTO users(user_id,user_name, password, first_name, last_name, email, phone, address) values('$user_id','$name','$password','$first_name','$last_name','$email','$phone','$address')";
        $this->conn->query($sql);
        header("Location: login.php");
        // if ($result) {
        //     echo "New record created successfully";
        // } else {
        //     var_dump($user_id);
        //     echo  "Error: " . $userObj->conn->error;
        // }
        
    } else {
        echo "Please enter every information";
    }
        }



        public function random_num($length)
        {
            $text = "";
            if ($length <5) {
                $length = 5;
            }
            $len = rand(4, $length);
            for ($i=0; $i <$len; $i++) {
                $text .=rand(0, 9);
            }
        
            return $text;
        }
        
    

    public function viewData()
    {
        $sql = "SELECT * FROM contact";
        $result = $this->conn->query($sql);

        if ($result->num_rows> 0) {
            $date = array();
            while ($row = $result->fetch_assoc()) {
                $date[] = $row;
            }

            return $date;
        }
    }
    public function add()
    {
        $business_name = $_POST['business_name'];
        $contact_name = $_POST['contact_name'];
        $email = $_POST['email'];
        $phone = (int) $_POST['phone'];
        $inquiry = $_POST['inquiry'];
        $product = $_POST['product'];

        // Usually way!
        $sql = "INSERT INTO contact (business_name, contact_name, email, phone, inquiry, product ) VALUES ( '$business_name', '$contact_name' , '$email', '$phone',  '$inquiry',  '$product')";


        if ($this->conn->query($sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $this->conn->error;
        }
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM contact WHERE id = '$id'";
        $result = $this->conn->query($sql);
        if($result){
            echo "the student Recorod had been deleted";
            header("Location: contact.php");
        }else{
            echo "not able to delete";
        }
    }

    public function getRecordById($id){
        // display the record of the student by id
        $sql = "SELECT * FROM contact WHERE id = '$id' LIMIT 1";
        $result = $this->conn->query($sql);
           
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
            echo var_dump($row);
        } else{
            echo "we don't  have an edit id";
        }
        

    }

    public function update($postDate)
    {
        $business_name = $_POST['business_name'];
        $contact_name = $_POST['contact_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $inquiry = $_POST['inquiry'];
        $product = $_POST['product'];
        $id = $_POST['id'];

        if(!empty($id) && !empty($postDate)){
            $sql = "UPDATE contact SET business_name = '$business_name', contact_name='$contact_name', email='$email', phone='$phone', inquiry='$inquiry', product='$product' WHERE id='$id'";
            $result = $this->conn->query($sql);

            if($sql){
                header("Location:contact.php");
            }else{
                echo "update failed";
            }
        }
    }






}