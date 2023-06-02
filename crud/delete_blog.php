<?php

session_start();
$id = $_REQUEST['id'];

$blogs = simplexml_load_file("file/index.xml");

// create an iterator
$index = 0;
$i = 0;

foreach($blogs->blog as $blog){
    // remove if the ID matches
    if ($blog->id == $id) {
        // Delete the associated image file
        $imagePath = 'uploads/' . $blog->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $index = $i;
        break;
    }
    $i++;
}

unset($blogs->blog[$index]);
file_put_contents('file/index.xml', $blogs->asXML());

$_SESSION['message'] = 'Blog Successfully Deleted';
header("location:index.php");

?>
