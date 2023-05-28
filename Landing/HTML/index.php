<?php
  require("../PHP/db.inc.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../CSS/landing.css?v=2" />
  <link rel="stylesheet" href="../css/media.css" />
  <link rel="stylesheet" href="../../landing/CSS/BodyStyle.css" />
  <link rel="stylesheet" href="../css/footer.css" />
  <link rel="stylesheet" href="../css/landing.css" />
  <link rel="stylesheet" href="../css/contact.css" />
  <link rel="stylesheet" href="../../assets/packages/Icons/fontawesome/css/all.css" />
  <title>PARSLL - Home Page</title>
  <style>
    <?php include '../css/media.css';
    ?>
  </style>
  <style>
    <?php include '../css/landing.css';
    ?>
  </style>
  <style>
    <?php include '../css/bodystyle.css';
    ?>
  </style>

</head>

<body id="Home">
  <div class="landing">
    <div class="NavBar">
      <div class="logo">
        <img src="../../assets/images/PARSLL-Logo.png" alt="Company Logo" id="logo" />
      </div>
      <ul class="listOfMenu hidden" id="NavBar">
        <li class="list list1"><a class="nav_link" href="#Home">Home</a></li>
        <li class="list list2"><a class="nav_link" href="#Services">Services</a></li>
        <li class="list list3"><a class="nav_link" href="#Blog">Blog</a></li>
        <li class="list list4"><a class="nav_link" href="#Partner">Partner</a></li>
        <li class="list list5"><a class="nav_link" href="#Project">Project</a></li>
        <li class="list list6"><a class="nav_link" href="#ContactUs">ContactUs</a></li>
        <li class="list list6"><a class="nav_link" href="login.php">login</a></li>
      </ul>
      <div class="hamburg" id="hamburg">
        <i id="hamburgIcon" class="fa-solid fa-bars"></i>
      </div>
    </div>
    <div class="slogan">
      <p><span>You</span><br />Say We Make</p>
    </div>
  </div>
  <div class="overlay"></div>
  <div class="backgroundImageLanding">
    <img src="../../assets/images/parsll-image.png" alt="Company Members" id="backgroundImage" />
  </div>

  <!-- Body Our Work -->
  <div class="container" id="Services">
    <div class="ourwork">
      <div class="ourwork-title">
        <div class="ourwork-title--main">SERVICES</div>
        <div class="ourwork-title--sub">
          <span class="ourwork-title--sub__main">We </span><span>PROVIDE</span>
        </div>
      </div>
      <div class="ourwork-main">
        <div class="ourwork-main--card">
          <div class="ourwork-main--card__image">
            <img src="../../assets/images/img.png" />
          </div>
          <div class="ourwork-main--car__main">Graphic Designing</div>
        </div>
        <div class="ourwork-main--card">
          <div class="ourwork-main--card__image">
            <img src="../../assets/images/img.png" />
          </div>
          <div class="ourwork-main--car__main">WEB Development</div>
        </div>
        <div class="ourwork-main--card">
          <div class="ourwork-main--card__image">
            <img src="../../assets/images/img.png" />
          </div>
          <div class="ourwork-main--car__main">App Development</div>
        </div>
        <div class="ourwork-main--card">
          <div class="ourwork-main--card__image">
            <img src="../../assets/images/img.png" />
          </div>
          <div class="ourwork-main--car__main">Digital Marketing</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Body 2 Section -->
  <div class="container" id="histry" style="margin-bottom: 0rem;">
    <div class="histry">
      <h2 class="header">Little Information About <span>PARSLL</span></h2>
      <p class="class">
        It is a long established fact that a reader will be distracted by the
        readable content of a page when looking at its layout. The point of
        using Lorem Ipsum is that it has a more-or-less normal distribution of
        letters, as opposed to using 'Content here, content here making it
        look like readable English.
      </p>
    </div>
    <div class="work-section" style="margin-top: 0rem;" id="Project">
      <h2 class="header">OUR WORK</h2>
      <div class="grid-container gridd-container">
        <?php
        $selectProjects = "SELECT * FROM `projects`";
        $result = mysqli_query($conn, $selectProjects);
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          $project_id = $row['project_id'];
          $title = $row['title'];
          $description = $row['description'];
          $image = $row['image'];
        ?>
        <div class="grid-item">
          <img src="../PHP/<?php echo $image; ?>" alt="image not supported" /><br />
          <?php echo $title; ?>
        </div>
        <?php } ?>
      </div>
    </div>
    <div id="Partner" class="slider">
      <h2 class="header">Partner</h2>

      <div class="logo-marquee--container">
        <div class="logo-marquee">
          <div class="clients-main--image">
            <a href="" target="_blank">
              <img class="clientimage" src="../../assets/images/khalti.png" />
            </a>
          </div>
          <div class="clients-main--image">
            <a href="" target="_blank">
              <img class="clientimage" src="../../assets/images/esewa.png" />
            </a>
          </div>
          <div class="clients-main--image">
            <a href="" target="_blank">
              <img class="clientimage" src="../../assets/images/yahoo.png" />
            </a>
          </div>
          <div class="clients-main--image">
            <a href="" target="_blank">
              <img class="clientimage" src="../../assets/images/siddhartha.png" />
            </a>
          </div>
          <div class="clients-main--image">
            <a href="" target="_blank">
              <img class="clientimage" src="../../assets/images/khalti.png" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Work Section -->
  <div class="work-section">
    <h1>Meet the crew</h1>
    <p>These are the people that make the magic happen.</p>
    <div class="grid-container">
      <div class="grid-item">
        <img src="../../assets/images/ajju.jpg" alt="image not supported" /><br />
        <p class="name">Ajju maharjan</p>
        <p class="post">Core Designer</p>
      </div>
      <div class="grid-item">
        <img src="../../assets/images/nisu.jpg" alt="image not supported" /><br />
        <p class="name">Nischal Acharya</p>
        <p class="post">Backend</p>
      </div>
      <div class="grid-item">
        <img src="../../assets/images/prajwal.png" alt="image not supported" /><br />
        <p class="name">Sagar khadka</p>
        <p>Backend</p>
      </div>
      <div class="grid-item">
        <img src="../../assets/images/santosh.png" alt="image not supported" /><br />
        <p class="name">Sunte Ghimire</p>
        <p>Frontend</p>
      </div>
      <div class="grid-item">
        <img src="../../assets/images/sagar.png" alt="image not supported" /><br />
        <p class="name">xavier</p>
        <p>Designer</p>
      </div>
      <div class="grid-item">
        <img src="../../assets/images/ajju.jpg" alt="image not supported" /><br />
        <p class="name">prajwal k ho</p>
        <p>Designer</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="description">
      <div class="images">
        <img src="../../assets/images/img.png" width="600" height="595" alt="image not supported" />
      </div>
      <div class="text">
        <h1>Where it all started</h1>
        <p>
          It is a long established fact that a reader will be distracted by
          the readable content of a page when looking at its layout. The point
          of using Lorem Ipsum is that it has a more-or-less normal
          distribution of letters, as opposed to using 'Content here, content
          here making it look like readable English. Many desktop publishing
          packages and web page editors now use Lorem Ipsum as their default
          model text, and a search for 'lorem ipsum' will uncover many web
          sites still in their infancy. Various versions have evolved over the
          years, sometimes by accident, sometimes on purpose (injected humour
          and the like).
        </p>
      </div>
    </div>
  </div>

  <!-- Contact Section -->
  <div class="contactContainer" id="ContactUs">
    <h1 class="contactHeading">Contact Us</h1>
    <div class="contactWrapper">
      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.8643541300376!2d85.35946007492352!3d27.721474124869193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1bda4a951f0f%3A0x3ddabb234891c3bd!2sBuddha%20Stupa!5e0!3m2!1sen!2snp!4v1682157171640!5m2!1sen!2snp"
          style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="contactForm">
        <img src="../../assets/images/contactImage.png" alt="" />
        <form method="post" action="../PHP/code.php">
          <div class="row row1">
            <input type="text" name="name" id="" placeholder="Your Name" />
            <input type="email" name="email" id="" placeholder="Your Email" />
          </div>
          <div class="row row2">
            <input type="text" name="subject" id="" placeholder="Subject" />
          </div>
          <div class="row row3">
            <textarea name="message" id="message" placeholder="Message"></textarea>
          </div>
          <div class="row row4">
            <input type="submit" value="Submit" name="submit" />
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="footer-section">
      <h1>Products</h1>
      <ul>
        <li><a href="#">Shared Hosting</a></li>
        <li><a href="#">Wordpress</a></li>
        <li><a href="#">Ecommerce</a></li>
        <li><a href="#">Reseller Hosting</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h1>Solutions</h1>
      <ul>
        <li><a href="#">Cloud Hosting</a></li>
        <li><a href="#">Python Hosting</a></li>
        <li><a href="#">Django Hosting</a></li>
        <li><a href="#">Nodejs Hosting</a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h1>Company</h1>
      <ul>
        <li><a href="#">Our Team</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Support</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
    <div class="download-buttons">
      <a href="#" class="app-store-btn"><i class="fab fa-apple"></i> Download on the App Store</a>
      <a href="#" class="play-store-btn"><i class="fab fa-google-play"></i> Get it on Google Play</a>
    </div>

    <div class="CopyRightSection">
      <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
      <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
      <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
      <p>&copy; 2023 Parsll. All rights reserved.</p>
    </div>
  </footer>
</body>
<script src="../JS/landing.js"></script>
<script src="../JS/navigation.js"></script>
<script src="/SplideJs/Spilide.js"></script>
<script>
  var splide = new Splide(".splide", {
    type: "loop",
    perPage: 3,
    autoplay: true,
  });

  splide.mount();
</script>

</html>