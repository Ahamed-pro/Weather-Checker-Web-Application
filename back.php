<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Result</title>
    <link rel="icon" type="image/webp" href="logo1.webp">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if (isset($_POST['city']) && !empty(trim($_POST['city']))) {

    $city = trim($_POST['city']);
    $apiKey = getenv("MY_WEB_API");

    if (!$apiKey) {
        echo '<div class="container">';
        echo '<h1>Weather Result</h1>';
        echo '<div class="error-box">API key not found.</div>';
        echo '</div>';
    } else {

        $url = "https://api.openweathermap.org/data/2.5/weather?q="
             . urlencode($city)
             . "&units=metric&appid=" . $apiKey;

        $response = @file_get_contents($url);

        if ($response === false) {

            echo '<div class="container">';
            echo '<h1>Weather Result</h1>';
            echo '<div class="error-box">Unable to fetch weather data.</div>';
            echo '</div>';

        } else {

            $data = json_decode($response, true);

            if (isset($data['cod']) && $data['cod'] == 200) {

                $temp = $data['main']['temp'];
                $desc = $data['weather'][0]['description'];

                echo '<div class="container">';
                echo '<h1>Weather Result</h1>';

            
                echo '<div class="loader"></div>';
                echo '<div class="loader-text">Fetching weather...</div>';

   
                echo '<div class="result-box" style="display:none;">';
                echo '<p><span>City:</span> ' . htmlspecialchars($city) . '</p>';
                echo '<p><span>Temperature:</span> ' . $temp . ' °C</p>';
              if ($temp <= 0) {
    echo '<p><span>Weather:</span> '. ucfirst($desc). ' 🧊</p>';
} else if ($temp> 0 && $temp < 10) {
    echo '<p><span>Weather:</span> '. ucfirst($desc). ' ❄️</p>';
} else if ($temp>= 10 && $temp < 15) {
    echo '<p><span>Weather:</span> '. ucfirst($desc). ' 🧥</p>';
} else if ($temp>= 15 && $temp < 20) {
    echo '<p><span>Weather:</span> '. ucfirst($desc). ' 🌤️</p>';
} else if ($temp>= 20 && $temp < 25) {
    echo '<p><span>Weather:</span> '. ucfirst($desc). ' 🌞</p>';
} else if ($temp>= 25 && $temp <= 30) {
    echo '<p><span>Weather:</span> '. ucfirst($desc). ' ☀️</p>';
} else if ($temp> 30) {
    echo '<p><span>Weather:</span> '. ucfirst($desc). ' 🔥</p>';
} else {
    echo '<p><span>Weather:</span> '. ucfirst($desc). '</p>';
}
                echo '</div>';
                echo '<br>';
                echo '<p style="color: #6ec1ff;  animation: slideUp 0.8s ease-out;">Developled By : Ahamed </p>';
                echo '</div>';

            } else {

                echo '<div class="container">';
                echo '<h1>Weather Result</h1>';
                echo '<div class="error-box">Weather not found for "' . htmlspecialchars($city) . '"</div>';
                echo '</div>';
            }
        }
    }

} else {

    echo '<div class="container">';
    echo '<h1>Weather Result</h1>';
    echo '<div class="error-box">Please enter a city name.</div>';
    echo '</div>';
}
?>

<script>
const loader = document.querySelector('.loader');
const loaderText = document.querySelector('.loader-text');
const resultBox = document.querySelector('.result-box');

if (loader && resultBox) {
    setTimeout(() => {
        loader.style.display = 'none';
        loaderText.style.display = 'none';
        resultBox.style.display = 'block';
    }, 1900);
}
</script>


</body>
</html>
