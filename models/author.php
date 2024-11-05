<?php 

require_once "../database/database.php";

class Author  {
    private $id;
    private $fname;
    private $lname;
    private $bio;

    public function __construct (int $id, string $fname, string $lname, string $bio)  {
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->bio = $bio;
    }

    public function getId ()  {
        return $this->id;
    }

    public function getFname ()  {
        return $this->fname;
    }

    public function getLname ()  {
        return $this->lname;
    }

    public function getBio ()  {
        return $this->bio;
    }

    public function getName ()  {
        return $this->fname." ".$this->lname;
    }

    public function Save()  {
        $sql = "insert into author 
            (author_id, fname, lname, bio)
            values (?, ?, ?, ?)
        ";
        $dataItems = [
            $this->id,
            $this->fname,
            $this->lname,
            $this->bio
        ];

        saveToTable($sql, $dataItems);
    }

    public static function getAuthorFromID (int $id)  {
        $sql = "select * from author where author_id = ?";
        $author = select_one_element($sql, [$id]);

        return new Author(
            $author["author_id"],
            $author["fname"],
            $author["lname"],
            $author["bio"]
        );
    }

    public static function displayAll ()  {
        $sql = "select * from author order by fname";
        $data = selectAllDatabase($sql, []);
        $authors = [];
        
        foreach ($data as $datum)  {
            array_push($authors, new Author(
                $datum["author_id"],
                $datum["fname"],
                $datum["lname"],
                $datum["bio"]
            ));
        }
        return $authors;
    }

}

?>
