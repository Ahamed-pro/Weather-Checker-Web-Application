<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Application</title>
    <link rel="icon" type="image/webp" href="logo1.webp">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <nav>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>
    <div class="container">
    <h1>Weather Application</h1>
    <h2>Instant Weather Update</h2>
<div class="form-box">
    <form action="back.php" method="post">
        <label for="city">CITY:</label>
        <input type="text" name="city" placeholder="CITY" required>
        <button type="submit">Search</button>
    </form>
    <br>
    <p style="color: #6ec1ff;  animation: slideUp 0.8s ease-out;">Developed by : Ahamed</p>
</div>
    </div>
</body>
</html>
