<?php

$conn = mysqli_connect('localhost','root','','ebook');

if(!$conn)
{
    echo 'Connection error: '.mysqli_connect_error();
}

?>