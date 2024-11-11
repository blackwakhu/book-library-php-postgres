<?php 

require_once "../../public/template/links.php";
require_once "../../models/book.php";

$book;

if (!empty($_GET["book_isdn"]) && !(Book::test_book_isdn($_GET["book_isdn"])))  {
    $book = Book::fetch_book_from_isbn($_GET["book_isdn"]);
} else  {
    header("Location: ../books.php");
    exit();
}

$authors = $book->getAuthors();
$genres = $book->getGenres();
$non_authors = $book->notAuthors();

if (isset($_POST["newauthor"]))  {
    $nauthor = new Author(
        $_POST["author_id"],
        $_POST["author_fname"],
        $_POST["author_lname"] ,
        $_POST["author_bio"]
    );
    $nauthor->Save();
    save_book_author($book, $nauthor);
}

if (isset($_POST["addauthor"]))  {
    $nauthor = Author::getAuthorFromID($_POST["author"]);
    save_book_author($book, $nauthor);
}

function save_book_author($book, $author)  {
    $book->addAuthor($author);
    header("Location: book.php?book_isdn=".$book->getISBN());
    exit();
}

$title = $book->getTitle();
$css = [
    "../../public/style/style.css",
    "../../public/style/books.css"
];

$js = [
    "../../public/function/function.js",
    "../../public/function/books.js"
]


?>

<!DOCTYPE html>
<html lang="en">

<?= headerTemplate($title, $css) ?>

<body>

    <a href="../books.php">Back</a>
    
    <h1>Books</h1>
    
    <div class="single_table_book_div">
        <table>
            <tbody>
                <tr>
                    <th>Title: </th>
                    <td><?= $book-> getTitle() ?></td>
                </tr>
                <tr>
                    <th>Edition: </th>
                    <td><?= $book->getEdition() ?></td>
                </tr>
                <tr>
                    <th>Year Published: </th>
                    <td><?= $book->getYear() ?></td>
                </tr>
                <tr>
                    <th>Synopsis: </th>
                    <td><?= $book->getSynopsis() ?></td>
                </tr>
                <tr>
                    <th>Series: </th>
                    <td><?= $book->getSeries() ?></td>
                </tr>
                <tr>
                    <th>Author: </th>
                    <td>
                        <?php 
                        if (empty($authors))  {
                            echo "<p>There are no authors</p>";
                        } else  {
                            foreach ($authors as $author)  {
                                echo $author->getName()."<br/>";
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Genres: </th>
                    <td>
                    <?php 
                        if (empty($genres))  {
                            echo "<p>There are no genres</p>";
                        } else  {
                            foreach ($genres as $genre)  {
                                echo $genre->getTitle()."<br/>";
                            }
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <button id="single_book_edit_btn">Edit Book</button>
        <button id="single_book_add_author_btn">Add Authors</button>
        <button id="single_book_add_genre_btn">Add Genres</button>
    </div>

    <div>

        <div class="single_book_add_author hiddenClass">
            <h4>Add author for <?= $book->getTitle() ?></h4>
        
            <?php 
                if (empty($authors))  {
                    echo "<p>Add Author</p>";
                } else  {
                    echo "
                        <p>Authors: <ul>";
                    foreach ($authors as $author)  {
                        echo "<li>".$author->getName()."</li>";
                    }
                    echo "
                            </ul>
                        </p>
                    ";
                }
            ?>
            
            <div>
                <h4>Available Authors</h4>
                <form action="./book.php?book_isdn=<?= $book->getISBN() ?>" method="post">
                    <select name="author" id="">
        
                        <?php
                            foreach ($non_authors as $non_author)  {
                                ?>
                                <option value="<?= $non_author->getId() ?>"><?= $non_author->getName() ?></option>
                                <?php
                            }
                        ?>
                        
                    </select>
                    <input type="submit" value="Add" name="addauthor">
                </form>
                <?= $s ?>
            </div>

            <div>
                <h4>New Author</h4>

                <form action="./book.php?book_isdn=<?= $book->getISBN() ?>" method="post">
                    <label for="id">Author ID</label>
                    <input type="text" name="author_id" id="">
                    <label for="fname">First Name</label>
                    <input type="text" name="author_fname" id="">
                    <label for="lname">Last Name</label>
                    <input type="text" name="author_lname" id="">
                    <label for="bio">Bio</label>
                    <textarea name="author_bio" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="New Author" name="newauthor">
                </form>

            </div>
                    
        </div>
        
        <div class="single_book_add_genre hiddenClass">
            
            <h4>Add Genre for <?= $book->getTitle() ?></h4>
        
        </div>
    
    </div>

    <?= getFunction($js) ?>
    
</body>
</html>
