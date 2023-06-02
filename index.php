<!DOCTYPE html>
<html>
<head>
  <title>Tourist Spot</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <div class="logo">
      <a href="crud/index.php">
      <img src="images/logo/philippines.png" alt="Logo">
    </a>
      <span class="logo-text">Marinduque Marvels</span>
    </div>
    
    <div class="search-bar">
      <form method="GET">
        <input type="text" name="search" id="search" placeholder="Search...">
        <button type="submit" name="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M22 21l-6-6 1.406-1.406L21 18.187l3-3zM11 18c-3.935 0-7-3.065-7-7s3.065-7 7-7 7 3.065 7 7-3.065 7-7 7zm0-12c-2.761 0-5 2.239-5 5s2.239 5 5 5 5-2.239 5-5-2.239-5-5-5z"/></svg></button>
        <button class="delete-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M8.707 7.293a1 1 0 0 1 0 1.414L6.414 12l2.293 2.293a1 1 0 1 1-1.414 1.414L5 13.414l-2.293 2.293a1 1 0 1 1-1.414-1.414L3.586 12 1.293 9.707a1 1 0 1 1 1.414-1.414L5 10.586l2.293-2.293a1 1 0 0 1 1.414 0z"/></svg></button>
      </form>
    </div>

    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>

  
    <section class="hero">
      <h1>Discover the Enchanting Charms of Marinduque</h1>
      <p>Experience an unforgettable journey through Marinduque's hidden gems,captivating wonders, and vibrant<br> culture, as you explore pristine beaches, lush landscapes, and indulge inwarm local hospitality.<br> </p>
      <a href="#" class="cta-button">Explore Now</a>
    </section>  


    <!----- church----->
    <section class="seasons">
    <h1>Marinduque's Three Enchanting Churches</h1>
    <div class="row">
      <div class="seasons-col">
        <p>
          The oldest church in Marinduque, located in Mataas na Bayan ng Boac, is well-preserved and over a hundred years old. It was built in 1792 and has historical significance, believed to have protected residents during a Moro attack. The church also blessed the Katipunan flag in 1899.
        </p>
        <div class="layer">
          <h3>BOAC CATHEDRAL</h3>
        </div>
      </div>

      <div class="seasons-col">
        <p>
          St. Joseph Parish Church is situated in Gasan, Marinduque's Poblacion. Located atop a hill, it offers a panoramic view of the town and a serene atmosphere. The church compound includes a meditation garden and a lookout point, providing a refreshing experience with open air and a distant view of the Tres Reyes islands.
        </p>
        <div class="layer">
          <h3>ST. JOSEPH PARISH CHURCH</h3>
        </div>
      </div>

      <div class="seasons-col">
        <p>
          The Holy Cross Parish in Sta. Cruz, Marinduque, is an impressive church built in 1714. Its solid brickwork and majestic presence make it stand out among other structures in the community. It holds the distinction of being the oldest standing structure in the province, predating the Boac Church constructed in 1792.
        </p>
        <div class="layer">
          <h3>HOLY CROSS PARISH</h3>
        </div>
      </div>
    </div>
    <h1>Toursit Spots</h1>
  </section>
  <main>   

    <?php
function displayBlog($blog) {
    echo '<div class="blog">';
    echo '<h3>' . $blog->title . '</h3>';
    echo '<p>' . $blog->content . '</p>';
    echo '<p><strong>Location:</strong> ' . $blog->author . '</p>';
    echo '<p><strong>Date:</strong> ' . $blog->date . '</p>';
    if (isset($blog->image)) {
        $imagePath = 'crud/' . $blog->image;
        if (file_exists($imagePath)) {
            // Wrap the image with an anchor tag linking to gallery.php and pass the image path as a query parameter
            echo '<a href="gallery.php?image=' . urlencode($imagePath) . '"><div class="blog-image"><img src="' . $imagePath . '" alt="Blog Image" style="max-width: 500px;" /></div></a>';
        } else {
            echo '<p>Image not found</p>';
        }
    }
    echo '</div>';
}

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $xml = simplexml_load_file('crud/file/index.xml');
    $found = false;

    foreach ($xml->blog as $blog) {
        if (stripos($blog->title, $search) !== false) {
            displayBlog($blog);
            $found = true;
        }
    }

    if (!$found) {
        echo '<p>No results found.</p>';
    }

    echo '<p>Showing results for search: ' . $search . '</p>';
} else {
    $xml = simplexml_load_file('crud/file/index.xml');

    foreach ($xml->blog as $blog) {
        displayBlog($blog);
    }
}
?>


  </main>
  <section class="testimonials">
    <h1>Developer Testimonials</h1>
    <p>
      Hear what our amazing developers have to say about their experiences, successes, and struggles on our platform, and how it has transformed their coding journey.
    </p>

    <div class="row">
      <div class="testimonials-col">
        <img src="images/pictures/cat-head.png" alt="">
        <div class="">
          <p>
            I'm disappointed because I ran out of time to fully implement the desired features in my project. As a solo programmer juggling multiple projects in different subjects, it became challenging to allocate sufficient time and resources to this specific project. Despite my best efforts, the limitations of time and being a sole developer have impacted the project's completion. I understand the importance of managing my workload effectively and will strive to better prioritize and allocate resources in the future to avoid similar situations.
          </p>
          <h3>Mr. cat</h3>
          <i class="star-icon fa fa-star" aria-hidden="true"></i>
          <i class="star-icon fa fa-star" aria-hidden="true"></i>
          <i class="star-icon fa fa-star" aria-hidden="true"></i>
          <i class="star-icon fa fa-star" aria-hidden="true"></i>
        </div>
      </div>

      <div class="testimonials-col">
        <img src="images/pictures/orange.png" alt="">
        <div class="">
          <p>
            As the only developer on this web platform, I've faced many challenges without any help or support. Despite the platform claiming to transform coding journeys, that's not the case. The lack of helpful peers and engaging discussions has left me feeling alone and frustrated. The absence of a supportive community has made it hard to overcome obstacles and grow as a developer. This platform hasn't delivered on its promise of transforming my coding experience, and I wish I had more collaboration and support.
          </p>
          <h3>Jayrel Palermo</h3>
          <i class="star-icon fa fa-star" aria-hidden="true"></i>
          <i class="star-icon fa fa-star" aria-hidden="true"></i>
          <i class="star-icon fa fa-star" aria-hidden="true"></i>
          <i class="star-icon fa fa-star" aria-hidden="true"></i>
          <i class="star-icon fa fa-star-half" aria-hidden="true"></i>
        </div>
      </div>
    </div>
  </section>

  <section class="cta">
      <h1>
       Get in touch with our team for inquiries, assistance,<br> or any questions you may have..
      </h1>
      <a href="#" class="hero-btn">CONTACT US</a>
  </section>
 
  <footer class="footer">
    <div class="icons">
      <a href="https://mobile.facebook.com/?_rdc=1&_rdr"><i class="icons-items fab fa-facebook-f"></i></a>
      <a href="https://twitter.com/login"><i class="icons-items fab fa-twitter"></i></a>
      <a href="https://www.instagram.com/?hl=en"><i class="icons-items fab fa-instagram"></i></a>
      <a href="https://web.telegram.org/"><i class="icons-items fab fa-telegram"></i></a>
      <p>&copy; <?php echo date("Y"); ?> Tourist Spot. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
