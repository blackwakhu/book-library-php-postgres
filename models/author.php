<?php 

require_once "../database/database.php";

class Author  {
    private $fname;
    private $lname;
    private $bio;

    public function __construct (string $fname, string $lname, string $bio)  {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->bio = $bio;
    }
}

?>