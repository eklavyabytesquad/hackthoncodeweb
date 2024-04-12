<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic skeleton</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <style>
        /* Additional CSS for box layout */
        .event-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
        .event {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        /* Hamburger menu styles */
.hamburger {
    display: none; /* Hide by default */
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
}

/* Show hamburger menu button only on smaller screens */
@media screen and (max-width: 756px) {
    .hamburger {
        display: block;
    }
    nav ul {
        display: none; /* Hide navigation menu by default on smaller screens */
        flex-direction: column;
        align-items: center;
        gap: 10px;
        padding-left: 0;
    }
    nav ul.active {
        display: flex; /* Show navigation menu when 'active' class is present */
    }
}

    </style>
</head>
<body>
<nav class="navbar">
    <div class="container">
        <button class="hamburger" id="hamburger">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-links">
            <li><a href="#home">HOME</a></li>
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#past-events">PAST EVENTS</a></li>
            <li><a href="#gallery">GALLERY</a></li>
            <li><a href="../db/login.php">LOGIN</a></li>
        </ul>
    </div>
</nav>

    
    <header id="home" class="club-home-page">
        <h1>Welcome to TechWiz Club!</h1>
        <p>Join us for exciting events and activities!</p>
    </header>
    <section id="about">
        <h2>About</h2>
        <p>TechWiz is more than just a club; it’s a dynamic community of tech enthusiasts, creative minds, and industry experts.</p>
        <p><span>Our mission?</span> To foster personal growth, leadership, and learning opportunities in engineering, technology, innovation, and design. As the oldest club at SRM Institute of Science and Technology, Ramapuram, we bring together student members from all domains of engineering and technology</p>
    </section>
    
        <div class="event_cards">
<div class="card" style="background:url(../Metaverse/1.jpeg)">
    <p class="heading">
      Popular this month
    </p>
   
    <p>Uiverse
  </p></div>
  <div class="card" style="background:url(../Metaverse/5.jpeg)">
    <p class="heading">
      Popular this month
    </p>
    
    <p>Uiverse
  </p></div>
  <div class="card card_last" style="background:url(../Metaverse/meta_2.png)">
    <p class="heading">
      Popular this month
    </p>
    
    <p>Uiverse
  </p></div>
</div>
<br><br>
<div class="event_cards" >
    <div class="card" style="background:url(../Metaverse/1.jpeg)">
        <p class="heading">
          Popular this month
        </p>

        <p>Uiverse
      </p></div>
      <div class="card" style="background:url(../Metaverse/meta_1.png)">
        <p class="heading">
          Popular this month
        </p>
       
        <p>Uiverse
      </p></div>
      <div class="card card_last" style="background:url(../Metaverse/meta_3.png)">
        <p class="heading">
          Popular this month
        </p>
        
        <p>TechWiz
      </p></div>
    </div>
  
  
    
    <br><br>
    <section id="gallery">
        <h2 class="gallery-heading">Gallery</h2>
        <div class="gallery-container">
            <div class="gallery-item"><img src="../Metaverse/1.jpeg" alt="" style="height:12rem; width:12rem;"></div>
            <div class="gallery-item"><img src="../Metaverse/5.jpeg" alt="" style="height:12rem; width:12rem;"></div>
            <div class="gallery-item"><img src="../Metaverse/meta_2.png" alt="" style="height:12rem; width:12rem;"></div>
          </div>
    </section>
    <section id="gallery">
        <div class="gallery-container">
            <div class="gallery-item"><img src="../Metaverse/1.jpeg" alt="" style="height:12rem; width:12rem;"></div>
            <div class="gallery-item"><img src="../Metaverse/5.jpeg" alt="" style="height:12rem; width:12rem;"></div>
            <div class="gallery-item"><img src="../Metaverse/meta_2.png" alt="" style="height:12rem; width:12rem;"></div>
          </div>
    </section>
    <footer>
    <div class="centered">
        <div id="copyright">&copy; Copyright TechWiz</div>
    </div>
    <div class="social">
        <ul>
            <li><a href="https://www.linkedin.com/company/techwiz-srmrmp/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="https://www.instagram.com/techwiz_rmp/" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://twitter.com/Techwiz_srm_rmp" target="_blank"><i class="fab fa-twitter"></i></a></li>
        </ul>
    </div>
    <div class="contact-form">
        <h3>Contact Us</h3>
        <form action="index.php" method="POST">
            <input type="text" name="name" placeholder="Your Name">
            <input type="email" name="email" placeholder="Your Email">
            <textarea name="message" placeholder="Your Message"></textarea>
            <button type="submit" name="submit">Send</button>
        </form>
    </div>
    <div class="additional-links">
        <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">FAQ</a></li>
        </ul>
    </div>
</footer>
<?php
require_once '../db/conn.php';

if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert data into your table
    $sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
    <script>
        // JavaScript for hamburger menu functionality
document.addEventListener('DOMContentLoaded', function () {
    // Select the hamburger button and the navigation menu
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.querySelector('nav ul');

    // Add click event listener to the hamburger button
    hamburger.addEventListener('click', function () {
        // Toggle the 'active' class on the navigation menu
        navMenu.classList.toggle('active');
    });
});

    </script>
</body>
</html>
