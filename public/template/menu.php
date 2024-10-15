<?php 

function get_dash_menu ($name)  {
    $menu = "
        <header>
            <ul class='menu-ul'>
                <li class='active'>$name</li>
                <li>Books</li>
                <li>Person</li>
                <li>Borrow</li>
            </ul>
        </header>
    ";
    return $menu;
}

?>