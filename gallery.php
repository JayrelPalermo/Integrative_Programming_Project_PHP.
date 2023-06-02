<!DOCTYPE html>
<html>
<head>
  <title>Gallery - Tourist Spot</title>
  <link rel="stylesheet" type="text/css" href="gallery.css">
</head>
<body>
  <header>
    <div class="logo">
      <a href="admin.php">
      <img src="images/logo/philippines.png" alt="Logo">
    </a>
      <span class="logo-text">Marinduque</span>
    </div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>

  <section class="box-design">
  </section>

  <main>
    <?php
if (isset($_GET['image'])) {
    $clickedImage = $_GET['image'];
    $xml = simplexml_load_file('crud/file/index.xml');
    $clickedBlog = null;

    // Find the blog entry with the clicked image
    foreach ($xml->blog as $blog) {
        $imagePath = 'crud/' . $blog->image;
        if ($imagePath === $clickedImage) {
            $clickedBlog = $blog;
            break;
        }
    }

    if ($clickedBlog) {
        echo '<div class="blog">';
        echo '<div class="clicked-image"><img src="' . $clickedImage . '" alt="Clicked Blog Image" style="max-width: 500px;" /></div>';
        echo '<h3>' . $clickedBlog->title . '</h3>';
        echo '<p>' . $clickedBlog->content . '</p>';
        echo '<p><strong>Location:</strong> ' . $clickedBlog->author . '</p>';
        echo '<p><strong>Date:</strong> ' . $clickedBlog->date . '</p>';
        echo '<p><strong>Restaurants:</strong> ' . $clickedBlog->restaurants . '</p>';
        echo '<p><strong>Events:</strong> ' . $clickedBlog->events . '</p>';
        echo '<p><strong>Activities:</strong> ' . $clickedBlog->activities . '</p>';
        echo '</div>';

        echo '<h4>You might also like:</h4>';
        echo '<div class="recommendations">';

        // Display recommended blogs
        foreach ($xml->blog as $blog) {
            $imagePath = 'crud/' . $blog->image;
            if ($imagePath !== $clickedImage) {
                echo '<div class="blog">';
                echo '<a href="gallery.php?image=' . urlencode($imagePath) . '">';
                echo '<div class="blog-image"><img src="' . $imagePath . '" alt="Recommended Blog Image" style="max-width: 500px;" /></div>';
                echo '</a>';
                echo '<h3>'. $blog->title . '</h3>';
                echo '</div>';
            }
        }

        echo '</div>';
    } else {
        echo '<p>Blog entry not found for the clicked image.</p>';
    }
} else {
    // Display all blogs as before
    $xml = simplexml_load_file('crud/file/index.xml');

    foreach ($xml->blog as $blog) {
        echo '<div class="blog">';
        echo '<h3>'. $blog->title . '</h3>';
        echo '<p>' . $blog->content . '</p>';
        echo '<p><strong>Location:</strong> ' . $blog->author . '</p>';
        echo '<p><strong>Date:</strong> ' . $blog->date . '</p>';
        echo '<p><strong>Restaurants:</strong> ' . $blog->restaurants . '</p>';
        echo '<p><strong>Events:</strong> ' . $blog->events . '</p>';
        echo '<p><strong>Activities:</strong> ' . $blog->activities . '</p>';
        if (isset($blog->image)) {
            $imagePath = 'crud/' . $blog->image; 
            if (file_exists($imagePath)) {
                // Wrap the image with an anchor tag linking back to gallery.php and pass the image path as a query parameter
                echo '<a href="gallery.php?image=' . urlencode($imagePath) . '"><div class="blog-image"><img src="' . $imagePath . '" alt="Blog Image" style="max-width: 500px;" /></div></a>';
            } else {
                echo '<p>Image not found</p>';
            }
        }
        echo '</div>';
    }
}
?>
  </main>
  <footer>
    <p>&copy; <?php echo date("Y"); ?> Tourist Spot. All rights reserved.</p>
  </footer>
</body>
</html>
