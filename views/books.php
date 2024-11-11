<?php 

require_once "../public/template/links.php";
require_once "../models/book.php";

$css = [
    "../public/style/style.css",
    "../public/style/books.css"
];

$js = [
    "../public/function/function.js",
    "../public/function/books.js"
];

$books = Book::get_all_book();

if (isset($_POST["addbook"]))  {
    $book = new Book (
        $_POST["title"],
        $_POST['edition'],
        $_POST['year'],
        $_POST['synopsis'],
        $_POST['series']
    );
    $book->Save();
    header("Location: books.php");
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">

<?= headerTemplate("Books", $css) ?>


<body>
    <ul>
        <li><a href="../dashboard.php">Home</a></li>
        <li><a id="book_sel" href="#">Books</a></li>
        <li><a id="add_book_sel" href="#">Add Book</a></li>
    </ul>

    <div class="books">
        <h1>Books</h1>
        <div>
            <div>
                <?php
                
                    if (!empty($books))  {
                        foreach ($books as $book)  {
                            ?>
                            <div class="book_list">
                                <h3>Title: 
                                    <a href="./books/book.php?book_isdn=<?= $book->getISBN() ?>">
                                        <?= $book->getTitle() ?>
                                    </a>
                                </h3>
                                <p>Edition: <?= $book->getEdition() ?></p>
                                <?php 
                                    $authors = $book->getAuthors();
                                    if (!empty($authors)) { ?>
                                    <p class="book_spe">Authors:
                                        <span class="book_author_list_div">
                                            <?php
                                                foreach ($authors as $author)  {
                                                    ?>
                                                        <span class="book_author_list"><?= $author->getName() ?></span>
                                                    <?php
                                                }
                                            ?>
                                        </span>
                                    </p>
                                <?php } ?>
                                <?php 
                                    $genres = $book->getGenres();
                                    if (!empty($genres)) { ?>
                                    <p class="book_spe">Genre:
                                        <span class="book_genre_list_div">
                                            <?php
                                                foreach ($genres as $genre)  {
                                                    ?>
                                                        <span class="book_genre_list"><?= $genre->getTitle() ?></span>
                                                    <?php
                                                }
                                            ?>
                                        </span>
                                    </p>
                                <?php } ?>
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="add hiddenClass">
        <h1>Add Books</h1>
        <div>
        <form action="./books.php" method="post">
            <label for="title">Title</label>
            <input type="text" name="title" id="" required/>
            <label for="edition">Edition</label>
            <input type="number" name="edition" id="" required min="1"/>
            <label for="year">Year of publication</label>
            <input type="number" name="year" id="" min="1000"/>
            <label for="synopsis">Synopsis</label>
            <textarea name="synopsis" id="" cols="30" rows="10" required></textarea>
            <label for="series">Series</label>
            <input type="text" name="series" id="" required>
            <input type="submit" value="submit" name="addbook"/>
        </form>
        </div>
    </div>

    <?= getFunction($js) ?>
    
</body>

</html>