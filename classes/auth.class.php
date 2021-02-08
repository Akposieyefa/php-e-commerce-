<?php
    /**
     * AUTH CLASS
     */
    include_once("db.class.php");
    include_once('helper.class.php');
    include_once("hash.class.php");
    include_once("mail.class.php");
    session_start();

    class Auth  Extends Hash
    {
        public  $date;
        private $helper;
        public  $conn;
        public  $result;
        public  $url;
        public  $msg;
        private $table = 'users';

        public function __construct()
        {
            $db = new DB();
            $this->conn = $db->dbConnect();
            $this->helper = new Helper();
        }

        public  function register($data)
        {
            $first_name =  $this->helper->validation($data['first_name']);
            $last_name =  $this->helper->validation($data['last_name']);
            $dob =  $this->helper->validation($data['dob']);
            $phone_number =  $this->helper->validation($data['phone_number']);
            $email =  $this->helper->validation($data['email']);
            $state =  $this->helper->validation($data['state']);
            $user_category =  $this->helper->validation($data['user_category']);
            $username =  $this->helper->validation($data['username']);
            $password =  $this->helper->validation($data['password']);
            $confirm_password = $this->helper->validation($data['confirm_password']);
            $validMail = $this->helper->validEmail($email);

            if ($password == "" || $email == "" || $first_name == "" ||   $last_name == "" || $dob =="" || $phone_number == "" || $state == "" ||  $user_category == "" ||  $username == "" ||  $confirm_password == "") {
                $this->msg = "<div class='alert alert-danger'>All fields are required...!</div>";
                return $this->msg;
            }elseif (!$validMail) {
                $this->msg = "<div class='alert alert-danger'>Email address must be valid...!</div>";
                return $this->msg;
            }elseif ($password !=  $confirm_password) {
                $this->msg = "<div class='alert alert-danger'>Password do not match</div>";
                return $this->msg;
            }else {
                $verificationCode = md5( rand(0,1000) );
                $query = "INSERT INTO $this->table (first_name,last_name,dob,phone_number,email,state,user_category,username,password,validation_code) 
                            VALUES (?,?,?,?,?,?,?,?,?,?) ";
                $hash = parent::makeHash($password);
                $stmt =  $this->conn->prepare($query);
                $stmt->bindParam(1, $first_name);
                $stmt->bindParam(2, $last_name);
                $stmt->bindParam(3, $dob);
                $stmt->bindParam(4, $phone_number);
                $stmt->bindParam(5, $email);
                $stmt->bindParam(6, $state);
                $stmt->bindParam(7, $user_category);
                $stmt->bindParam(8, $username);
                $stmt->bindParam(9, $hash);
                $stmt->bindParam(10,$verificationCode);
                $this->result = $stmt->execute();
                if (!$this->result) {
                    $this->msg = "<div class='alert alert-danger'>Error in registration process</div>";
                    return $this->msg;
                }else {
                    $mail = new Mail();
                    $message = " <a href='http://localhost:9090/verify.php?v_key=$verificationCode'> Verify Email </a>";
                    $mail->mailCreate($email,"Verification Link", $message);
                    $this->msg = "<div class='alert alert-success'>Registration successful check your email for verification link</div>";
                    return $this->msg;
                }

            }

        }

        /**
         * admin auth login function
         * @param $data
         * @return string
         */
        public function login($data)
        {
            $this->url = "admin/dashboard.php";
            $email    	= $this->helper->validation($data['email']);
            $password   = $this->helper->validation($data['password']);
            $validMail  = $this->helper->validEmail($email);

            if ($password == "" || $email == "") {
                $this->msg = "<div class='alert alert-danger'>All fields are required...!</div>";
                return $this->msg;
            }elseif (!$validMail) {
                $this->msg = "<div class='alert alert-danger'>Email address must be valid...!</div>";
                return $this->msg;
            }else {
                    $auth = $this->auth($email);
                    if ($auth) {
                       foreach ($auth as $key => $value) {
                          $hash =  $value['password'];
                          if (parent::verifyHash($password,$hash)) {
                            $make_session = $this->getAuthDetails($email);
                            foreach($make_session as $email)
                            {
                                $_SESSION['session'] = $email;
                                if (isset($_SESSION['session']))	{
                                    header("location:$this->url");
                                }
                            }
                            } else {
                                $this->msg = "<div class='alert alert-danger'>Password is not correct...!</div>";
                                return $this->msg;
                            }
                       }
                    } else {
                        $this->msg = "<div class='alert alert-danger'>Details entered wrongly...!</div>";
                         return $this->msg;
                    }
            }
        }


        /**
         * auth
         * @param $email
         * @return bool
         */
        public function  auth($email) {
            $query = "SELECT email,password FROM $this->table  WHERE email=?";
            $stmt =  $this->conn->prepare($query);
            $stmt->bindParam(1, $email);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        /**
         * fetching session details
         * @param $email
         * @return bool
         */
        public function getAuthDetails($email)
        {
            $query = "SELECT * FROM $this->table WHERE email=?";
            $stmt =  $this->conn->prepare($query);
            $stmt->bindParam(1, $email);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        /**
         * @param $code
         * verify
         */
        public function  verify($code)
        {
            $query = "SELECT active,validation_code FROM $this->table WHERE active=0 AND validation_code=?";
            $stmt =  $this->conn->prepare($query);
            $stmt->bindParam(1, $code);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $updateQuery ="UPDATE $this->table SET active = 1 WHERE validation_code=?";
                $stmt =  $this->conn->prepare($updateQuery);
                $stmt->bindParam(1, $code);
                $update = $stmt->execute();
                if ($update) {
                    header("location:http://localhost:9090/login.php");
                }
            }
        }
  
    }