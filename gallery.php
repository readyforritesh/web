<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .gallery-image {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Gallery</h1>
        <div class="row">
            <?php
            include 'connection.php';
            $query = "SELECT img_name FROM image";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imgName = $row['img_name'];
                    echo '<div class="col-md-4">';
                    echo '<img src="images/' . $imgName . '" class="gallery-image img-fluid" alt="Gallery Image">';
                    echo '</div>';
                }
            } else {
                echo '<p>No images found in the gallery.</p>';
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>