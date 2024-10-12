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

    public static function get_Person ($uname, $passwrd)  {
        $conn = getConnection();
        $sql = "select * from person where uname = ? and password = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$uname, $passwrd]);
        $user = $statement->fetch(\PDO::FETCH_ASSOC);

        if ($user) {
            return new Person(
                $user['fname'],
                $user['lname'],
                $user['uname'],
                $user['password'],
                $user['dob'],
                $user['email'],
                $user['contact']
            );
        } else {
            return null;
        }
        
    }
    public static function query_Person ($uname)  {
        $conn = getConnection();
        $sql = "select * from person where uname = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$uname]);
        $user = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $user;
    }

    
}

function query_Person ($uname)  {
    $conn = getConnection();
    $sql = "select * from person where uname = ?";
    $statement = $conn->prepare($sql);
    $statement->execute([$uname]);
    $user = $statement->fetchAll();
    return $user;
}

function get_Person ($uname, $passwrd)  {
    $person = NULL;
    return $person;
}

?>
