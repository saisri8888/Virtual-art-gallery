<?php 
  session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Art Gallery</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            background-image: url(images/main1.jpg);
            background-size: 99.9% 100%;
            color: #333;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
            overflow: hidden;
        }

        h1 {
            font-size: 3rem;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .intro-text {
            font-size: 1.4rem;
            color: #7f8c8d;
            margin-bottom: 40px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .btn {
            padding: 15px 30px;
            font-size: 1.2rem;
            color: white;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn:hover {
            background-color: #2980b9;
            transform: translateY(-5px);
        }

        .btn:focus {
            outline: none;
        }

        .btn.gallery {
            background-color: #2ecc71;
        }

        .btn.gallery:hover {
            background-color: #27ae60;
        }

        .btn.about {
            background-color: #e67e22;
        }

        .btn.about:hover {
            background-color: #d35400;
        }

        .btn.traditional {
            background-color: green;
        }

        .btn.traditional:hover {
            background-color:green;
        }

        .btn.upload {
            background-color: purple;
        }

        .btn.upload:hover {
            background-color:purple;
        }
        .btn.perform {
            background-color: grey;
        }

        .btn.perform:hover {
            background-color:grey;
        }

    </style>
</head>
<body>

    <h1>Explore The Arts</h1>
    <p class="intro-text">Explore beautiful artworks, learn about the gallery..</p>

    <div class="button-container">
    
         <a href="traditional.html" class="btn traditional">Traditional Arts</a>
        <a href="graphicsarts.html" class="btn about">Graphic Arts</a>
        <a href="visualarts.html" class="btn gallery">Visual Arts</a>
        <a href="plasticarts.html" class="btn contact">Plastic Arts</a>
        <a href="performarts.html" class="btn perform">Performing Arts</a>
        <a href="upload.php" class="btn upload">UPLOAD</a>
    </div>

</body>
</html>
