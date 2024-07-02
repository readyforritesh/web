<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .nav-tabs {
      margin-bottom: 20px;
    }

    .tab-content {
      padding: 20px;
      border: 1px solid #dee2e6;
      border-top: none;
      background-color: white;
    }

    .img-thumbnail {
      max-width: 200px;
      max-height: 200px;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <h1 class="text-center">Admin Panel</h1>

    <?php
    session_start();
    include 'connection.php';


    // Handle form submissions for updating home section
    if (isset($_POST['home'])) {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $query2 = "UPDATE home SET title = '$title', Description = '$description' WHERE textid = 1;";
      $home = mysqli_query($conn, $query2);
    }

    // Handle image upload
    if (isset($_POST['submit'])) {
      if (isset($_FILES['image'])) {
        $image = $_FILES['image'];
        $fileName = $image['name'];
        $size = $image['size'];
        $fileTemp = $image['tmp_name'];
        $type = $image['type'];
        $size_converted = $size / 1048576; // Convert bytes to MB

        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $date = date("Y-m-d-H-i-s");
        $newfilename = $date . "." . $extension;

        // Check file type and size
        if (($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg") && $size_converted < 5) {
          // Move uploaded file to directory
          move_uploaded_file($fileTemp, 'img/' . $newfilename);

          // Insert image details into database
          $query_insert = "INSERT INTO image (img_name) VALUES ('$newfilename')";
          $result_insert = mysqli_query($conn, $query_insert);

          if ($result_insert) {
            echo "<div class='alert alert-success mt-3'>File uploaded successfully.</div>";
          } else {
            echo "<div class='alert alert-danger mt-3'>Error uploading file.</div>";
          }
        } else {
          echo "<div class='alert alert-danger mt-3'>Error: File type not supported or file size exceeds limit (5MB).</div>";
        }
      } else {
        echo "<div class='alert alert-danger mt-3'>No files selected.</div>";
      }
    }
    ?>

    <ul class="nav nav-tabs" id="adminTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
          role="tab" aria-controls="home" aria-selected="true">Home</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button"
          role="tab" aria-controls="gallery" aria-selected="false">Gallery</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button"
          role="tab" aria-controls="skills" aria-selected="false">Skills/Experience</button>
      </li>
    </ul>

    <div class="tab-content" id="adminTabsContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <form method="post">
          <div class="mb-3">
            <label for="homeTitle" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="homeTitle"
              placeholder="Enter home page title">
          </div>
          <div class="mb-3">
            <label for="homeDescription" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="homeDescription" rows="5"
              placeholder="Enter home page description"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="home">Update</button>
        </form>
      </div>

      <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">