<?php 

class Person {

    private string $f_name;
    private string $l_name;
    private string $u_name;
    private string $passwrd;
    private string $dob;

    public function __construct ($f_name, $l_name, $u_name, $passwrd, $dob)  {
        $this->f_name = $f_name;
        $this->l_name = $l_name;
        $this->u_name = $u_name;
        $this->passwrd = $passwrd;
        $this->dob = $dob;
    }
}



?>