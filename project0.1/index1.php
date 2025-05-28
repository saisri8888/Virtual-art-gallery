<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Community Page</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            color: #fff;
            background: linear-gradient(135deg, #4c2a85, #8440a1);
            background-image: url(images/tor.jpg);
            background-size: 99.9% 100%;
        }

        /* Header Section */
        header {
            background-color: rgba(0, 0, 0, 0.2);
            padding: 10px 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            font-size: 30px;
        }

    

        nav ul {
            align-item:center;
            list-style: none;
            display: flex;
            gap: 150px;
            
        }

        nav ul li a {
            text-decoration: none;
            color: rgb(71, 66, 55);
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color:rgb(8, 92, 99);
        }
        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #7d2ae8, #4c2a85), url('background.jpg') ;
            background-image: url(images/tor.jpg);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            background-image: url(images/tor.jpg);
            background-size: 99.9% 98.0%;
            z-index: 0;
        }

        .hero-content {
            position: relative;
            conatiner:transparent;
            z-index: 1;
            color: #fff;
        }

        .hero-content h1 {
            font-size: 60px;
            margin-bottom: 50px;
            color:rgb(8, 92, 99);
            text-transform: uppercase;
            font-family:italic;
            font-weight: bold;
        }

        .hero-content p {
            font-size: 25px;
            font-family:Algerian;
            color:rgb(138, 114, 80);
            margin-bottom: 30px;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            background:rgb(8, 92, 99);
            color: #fff;
            font-size: 16px;
            text-decoration: none;
            border-radius: 30px;
            transition: all 0.3s ease;
            margin-bottom: 170px;
            box-shadow: 0px 5px 15px rgb(8, 92, 99);
        }

        .button:hover {
            background:rgb(8, 92, 99);
            box-shadow: 0px 7px 20px rgb(8, 92, 99);
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
        
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>WELCOME</h1>
                <p> To Our Virtual Art Gallery</p>
                <p> A Space where imagination comes to life and every artwork invites you to discover something new.</p>
                <a href="register.php" class="button">Visit</a>
            </div>
        </section>
    </main>
</body>
</html>
