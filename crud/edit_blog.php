<?php
session_start();

if (isset($_REQUEST['edit_blog'])) {
    $blogs = simplexml_load_file('file/index.xml');

    foreach ($blogs->blog as $blog) {
        if ($blog->id == $_POST['blog_id']) {
            $blog->title = $_POST['blog_title'];
            $blog->author = $_POST['blog_author'];
            $blog->date = $_POST['blog_date'];
            $blog->content = $_POST['blog_content'];
            $blog->restaurants = $_POST['blog_restaurants'];
            $blog->events = $_POST['blog_events'];
            $blog->activities = $_POST['blog_activities'];

            // Check if an image file was uploaded
            if ($_FILES['blog_image']['error'] === UPLOAD_ERR_OK) {
                $image_path = 'uploads/' . $_FILES['blog_image']['name'];
                
                // Move the uploaded image to the images folder
                move_uploaded_file($_FILES['blog_image']['tmp_name'], $image_path);
                
                // Update the image path in the XML
                $blog->image = $image_path;
            }

            // Check if the delete image option is selected
            if (isset($_POST['delete_image'])) {
                // Remove the image path from the XML
                unset($blog->image);
                
                // Delete the image file from the server
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            
            break;
        }
    }

    file_put_contents('file/index.xml', $blogs->asXML());
    $_SESSION['message'] = "Blog Successfully Updated";
    header("location: index.php");
} else {
    $_SESSION['message'] = "Select a blog to edit first";
    header("location: index.php");
}
?>
