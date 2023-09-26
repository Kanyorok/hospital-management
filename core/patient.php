<?php 

class Post {

    //database conn
    private $conn;
    private $table = 'patients';

    //patient properties
    public $id;
    public $fullName;
    public $bloodType;
    public $contact;
    public $prescription;
    public $age;
    public $appointment; 
    public $condition;     

    //make constructor with db connection
    public function __construct($connect) {
        $this -> conn = $connect;
    }

    //getting the post from db
    public function read(){
        //create query
        $query = 'SELECT
            p.Full_Name, 
            p.Blood_type, 
            p.Contact, 
            p.Prescription, 
            p.age, 
            p.Appointment, 
            p.HCondition,
            FROM
            ' .$this -> table . ' p ORDER BY p.Appointment';

        //prepare statement
        $stmt = $this->conn -> prepare($query);
        $stmt -> execute();

        return $stmt;
    }

}
