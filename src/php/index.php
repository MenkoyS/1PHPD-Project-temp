<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container">
        <div class="left">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="services.php">Services</a></li>
                </ul>
            </nav>
            <h1>Welcome to our website</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>

            <form action="search.php" method="POST">
                <input type="text" name="search" placeholder="Search">
            </form>
            <h2>Check out our latest posters</h2>
            <div class="posters">
                <div class ="poster">
                    <img src="../../assets/oppenheimer.jpg" alt="">
                    <p>Description</p>
                    <p>author : Coisne Yannick</p>
                </div>
                <div class ="poster">
                    <img src="../../assets/plateform.jpg" alt="">
                    <p>Description</p>
                    <p>author : Coisne Yannick</p>
                </div> 
                <div class ="poster">
                    <img src="../../assets/wolf-of-wall-street.webp" alt="">
                    <p>Description</p>
                    <p>author : Coisne Yannick</p>
                </div>
            </div>
        </div>
        <div class="right">
            <div class=right_description>
                <h2>Box Office</h2>
                <p> Lorem Ipsum. </br> Made by Coisne Yannick</p>
                <button>Watch it now !</button>
            </div>
        </div>
    </div>
</body>

</html>