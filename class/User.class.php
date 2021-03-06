<?php
/**
 * Author: jay
 * Date: 2/25/15
 * Time: 8:25 PM
 */

require_once "class/DB.class.php";

class User {

    // user credentials. More to be added (location, gender, ....)
    public $id;
    public $email;
    public $hashedpw;
    public $fname;
    public $lname;
    public $age;
    public $gender;
    public $emailAddress;
    public $contactNumber;

    // constructor for the User class. Takes in an array. More variables to be added.
    function __construct($data) {
        $this->id = isset($data['id']) ? $data['id'] : "";
        $this->email = isset($data['email']) ? $data['email'] : "";
        $this->hashedpw = isset($data['password']) ? $data['password'] : "";
        $this->fname = isset($data['fname']) ? $data['fname'] : "";
        $this->lname = isset($data['lname']) ? $data['lname'] : "";
        $this->age = isset($data['age']) ? $data['age'] : "";
        $this->gender = isset($data['gender']) ? $data['gender'] : "";
        $this->emailAddress = isset($data['emailAddress']) ? $data['emailAddress'] : "";
        $this->contactNumber = isset($data['contactNumber']) ? $data['contactNumber'] : "";

    }

    /*
     *  @param boolean @return true if success.
     *  Save or update user information to database.
     */
    public function save($newUser = false) {
        $db = new DB();
        $db->connect();
        if ($newUser) {
            $data = array("email" => "'$this->email'", "password" => "'$this->hashedpw'",
                "join_date" => "'".date("Y-m-d:h:i:s", time())."'");
            $this->id = $db->insert($data, "user");
        } else {
            $data = array("password" => "'$this->hashedpw'", "fname" => "'$this->fname'", "lname" => "'$this->lname'", "age" => "'$this->age'", "gender" => "'$this->gender'", "contactNumber" => "'$this->contactNumber'");


            $db->update($data, "user", ' id = '.$this->id);
        }
        $db->closeCon();
        return true;
    }
}

?>