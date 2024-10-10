<?php 

require $_SERVER['DOCUMENT_ROOT']."/database/database.php";


class Person {

    private string $f_name;
    private string $l_name;
    private string $u_name;
    private string $passwrd;
    private string $dob;
    private string $email;
    private string $contact;

    public function __construct ($f_name, $l_name, $u_name, $passwrd, $dob, $email, $contact)  {
        // constructor
        $this->f_name = $f_name;
        $this->l_name = $l_name;
        $this->u_name = $u_name;
        $this->passwrd = $passwrd;
        $this->dob = $dob;
        $this->email = $email;
        $this->contact = $contact;
    }

    public function save ()  {
        // save data
        $conn = getConnection();
        $sql = "insert into person(uname, fname, lname, password, dob, email, contact)
                values( ?, ?, ?, ?, ?, ?, ?);";
        $statement = $conn->prepare($sql);
        $statement->execute([
            $this->u_name,
            $this->f_name,
            $this->l_name,
            $this->passwrd,
            $this->dob,
            $this->email,
            $this->contact
        ]);
    }

    public function hello ()  {
        return "hello $this->f_name $this->l_name";
    }
}



?>