<?php
session_start();

// Check if the button is clicked
if (isset($_POST['publish'])) {
    // Open XML file
    $blogs = simplexml_load_file('file/index.xml');

    // Prepare all the tags and data
    $blog = $blogs->addChild('blog');

    $blog->addChild('id', $_POST['blog_id']);
    $blog->addChild('title', $_POST['blog_title']);
    $blog->addChild('author', $_POST['blog_author']);
    $blog->addChild('date', $_POST['blog_date']);
    $blog->addChild('content', $_POST['blog_content']);
    $blog->addChild('restaurants', $_POST['blog_restaurants']);
    $blog->addChild('events', $_POST['blog_events']);
    $blog->addChild('activities', $_POST['blog_activities']);

    // Handle image upload
    $targetDirectory = 'uploads/';
    $targetFile = $targetDirectory . basename($_FILES['blog_image']['name']);

    // Move uploaded image to the target directory
    if (move_uploaded_file($_FILES['blog_image']['tmp_name'], $targetFile)) {
        // Image upload success, store the image path in the XML file
        $blog->addChild('image', $targetFile);
    }

    // Save the data
    $dom = new DOMDocument();
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($blogs->asXML());
    $dom->save('file/index.xml');

    // Send a message to index
    $_SESSION['message'] = "Blog Successfully Posted";
    header("location: index.php");
} else {
    $_SESSION['message'] = "Fill up the form properly";
    header("location:index.php");
}
?>
