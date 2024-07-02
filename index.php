<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Photography</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "stylesheet" href = "css/style.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        nav {
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 15px;
            display: block;
        }
        nav ul li a:hover {
            background-color: #575757;
        }
        .content {
            margin-top: 60px; /* Adjust based on the height of the nav */
        }
        .white{
            color:white;
        }
    </style>
</head>
<body>
    
    <!-- header -->
    <nav>
    <div class="navbar-header">
    <a class="navbar-brand page-scroll" href="index.html">Pixel Photography</a>
    </div>
        <ul class="nav-links">
            <li><a href="#about">About</a></li>
            <li><a href="#work">Work</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#contact">Contact</a></li>
            
        </ul>
    </nav>

    <header id="header" class="vh-100 flex content">
        <div class="container">
            <div class="header-content">
            <?php
include 'connection.php';

$query = "SELECT Description FROM home";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $description = $row['Description'];
} else {
    $description = "Default description"; // Provide a default if no description is found
}

mysqli_close($conn);
?>

<div class="col-12 col-lg-8 col-xl-6">
    <div class="welcome-text">
        <h1>I'm a <br>
            <span class="typewrite" data-loop="yes" data-speed="100" data-delay="2000" data-words='["photographer", "videographer", "video editor"]'></span>
        </h1>
        <p data-animation="bounceInUp" data-delay="500ms" class="white"><?php echo $description; ?></p>
    </div>
</div>


            </div>
        </div>
    </header>
    <!-- end of header -->

    <!-- main content -->
    <main class="content">
        <!-- about section -->
        <section id="about" class="about py-7">
            <div class="container">
                <div class="about-content grid">
                    <div class="about-left">
                        <img src="ritesh.jpg" alt="">
                    </div>
                    <div class="about-right">
                        <div class="title">
                            <h2>About Me</h2>
                        </div>
                        <p class="lead">Ritesh Gyawali is a professional photographer renowned for capturing stunning images that tell compelling stories. With a keen eye for detail and a passion for visual artistry, Ritesh transforms ordinary moments into extraordinary memories through his lens. His work spans various genres, showcasing his versatility and dedication to the craft of photography.</p>
                        <p class="lead">We can checkout his recent works and experiences below. He considers photography as his passion more than profession.</p>
                        <a href="#work" class="btn-down">
                            <i class="fas fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of about section -->

        <!-- work section -->
        <section id="work" class="vh-100 flex py-7">
            <div class="container">
                <div class="work-content">
                    <div class="title">
                        <h2>what am i doing?</h2>
                    </div>
                    <ul class="work-top grid">
                        <li class="lead"><i class="fas fa-dot-circle"></i> We work according to the guidelines of the ISMT of Digital Photography with regard to color management and file handling.</li>
                        <li class="lead"><i class="fas fa-dot-circle"></i> Your files will be stored multiples times on two locations</li>
                        <li class="lead"><i class="fas fa-dot-circle"></i> We work with the terms and conditions of the Dupho, registered at the court in Lalitpur with number 2024/07/02</li>
                        <li class="lead"><i class="fas fa-dot-circle"></i> We always have back-up equipment at hand, also on location.</li>
                    </ul>

                    <div class="work-bottom grid">
                        <div>
                            <span class="icon"><img src="images/wildlife-icon.png"></span>
                            <h3>Wildlife</h3>
                        </div>
                        <div>
                            <span class="icon"><img src="images/portrait-icon.png"></span>
                            <h3>Portrait</h3>
                        </div>
                        <div>
                            <span class="icon"><img src="images/landscape-icon.png"></span>
                            <h3>Landscape</h3>
                        </div>
                        <div>
                            <span class="icon"><img src="images/family-icon.png"></span>
                            <h3>Family</h3>
                        </div>
                    </div>
                    <a href="#portfolio" class="btn-down btn-down-white">
                        <i class="fas fa-chevron-down"></i>
                    </a>
                </div>
            </div>
        </section>
        <!-- end of work section -->

        <!-- portfolio section -->
        <section id="portfolio" class="vh-100 py-7">
            <div class="container">
                <div class="portfolio-content">
                    <h1 class="mt-5">Gallery</h1>
                    <div class="row">
                    <div class="gallery">
                    <?php
include 'connection.php';
$query = "SELECT img_name FROM image";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div style="display: flex; flex-wrap: wrap; justify-content: space-around;">'; // Container with flexbox
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($count % 3 == 0 && $count != 0) {
            echo '</div><div style="display: flex; flex-wrap: wrap; justify-content: space-around;">'; // Start a new row every 3 images
        }
        echo '<div style="margin: 10px; text-align: center;">'; // Centered and with margin for spacing
        echo '<img src="images/' . $row['img_name'] . '" alt="Image" style="max-width: 300px; height: 300px; object-fit: cover;">'; // Image sizing
        echo '</div>';
        $count++;
    }
    echo '</div>'; // End of container
} else {
    echo '<p>No images found in the database.</p>';
}
?>


                    </div>
                </div>
            </div>
        </section>
        <!-- end of portfolio section -->

        <!-- contact section -->
        <section id="contact" class="py-7">
            <div class="container">
                <div class="contact-content flex">
                    <div class="contact-left">
                        <div class="title">
                            <h2>contact me</h2>
                        </div>
                        <p class="lead"><i class="fas fa-phone-alt"></i> +977 9816497898</p>
                        <p class="lead"><i class="fas fa-envelope"></i> gyawaliritesh007@gmail.com</p>
                        <form action="">
                            <input type="text" class="form-control" placeholder="Your name here ...">
                            <input type="email" class="form-control" placeholder="Your email here">
                            <input type="submit" class="btn-submit btn" value="Submit">
                        </form>
                    </div>

                    <div class="contact-right">
                        <img src="images/contact-pic.jpg" alt="contact image">
                    </div>
                </div>
            </div>
        </section>
        <!-- end of contact section -->

    </main>
    <!-- end of main content -->

    <!-- footer -->
    <footer id="footer" class="py-7">
        <div class="container">
            <div class="footer-content">
                <div>
                    <h3>RITESH GYAWALI</h3>
                    <div><img src="images/ritesh.jpg"></div>
                </div>

                <div>
                    <h3>Links</h3>
                    <ul class="flex">
                        <li><a href="#about">About Me</a></li>
                        <li><a href="#work">Work</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#contact">Contact Me</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->


    <!-- typewriting js -->
    <script src="typewriting-master/typewriting.js"></script>
</body>
</html>
