<?php
// Directory for uploaded images
$targetDir = "uploads/";
$dataFile = $targetDir . "data.json";

// Create the uploads directory if it doesn't exist
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Initialize metadata file if it doesn't exist
if (!file_exists($dataFile)) {
    file_put_contents($dataFile, json_encode([]));
}

// Load existing metadata
$imageData = json_decode(file_get_contents($dataFile), true);

// Handle file uploads
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_FILES['images']['name'] as $key => $name) {
        $targetFile = $targetDir . basename($name);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Validate the file
        $check = getimagesize($_FILES['images']['tmp_name'][$key]);
        if (
            $check !== false &&
            $_FILES['images']['size'][$key] <= 5000000 &&
            in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])
        ) {
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFile)) {
                // Save metadata
                $imageData[] = [
                    'file' => basename($name),
                    'title' => $_POST['titles'][$key],
                    'description' => $_POST['descriptions'][$key],
                ];
            }
        }
    }
    // Save metadata to the file
    file_put_contents($dataFile, json_encode($imageData));
}

// Retrieve all uploaded images
$images = json_decode(file_get_contents($dataFile), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e293b;
            color: #2B4C64;
            background-image: url(images/up2.jpg);
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
            color: #2B4C64;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            background-image: url(up2.jpg);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        form div {
            margin-bottom: 15px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        form input, form textarea, form button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button {
            background-color:#2B4C64 ;
            color: #fff;
            cursor: pointer;
            border: none;
        }

        form button:hover {
            background-color:#2B4C64;
        }

        .swiper {
            width: 90%;
            height:90%;
            max-width: 800px;
            margin: 30px auto;
            padding: 20px 0;
        }

        .swiper-slide {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #2B4C64;
            background-image: url(up2.jpg);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .swiper-slide img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
        }

        .swiper-slide h3 {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }

        .swiper-slide p {
            font-size: 14px;
            color: #2B4C64 ;
        }

        .swiper-pagination-bullet-active {
            background:#2B4C64;
        }
    </style>
</head>
<body>
    <h1>Upload and View Images</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="images">Select images to upload:</label>
            <input type="file" name="images[]" id="images" multiple required>
        </div>
        <div>
            <label for="titles">Enter titles:</label>
            <input type="text" name="titles[]" id="titles" placeholder="Enter a title for each image" required>
        </div>
        <div>
            <label for="descriptions">Enter descriptions:</label>
            <textarea name="descriptions[]" id="descriptions" placeholder="Enter a description for each image" required></textarea>
        </div>
        <button type="submit">Upload</button>
    </form>

    <h2 style="text-align: center;">Images</h2>
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php foreach ($images as $image): ?>
                <div class="swiper-slide">
                    <img src="<?php echo $targetDir . $image['file']; ?>" alt="<?php echo htmlspecialchars($image['title']); ?>">
                    <h3><?php echo htmlspecialchars($image['title']); ?></h3>
                    <p><?php echo htmlspecialchars($image['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>
</html>
