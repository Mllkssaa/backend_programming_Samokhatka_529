<?php

$apiKey = "AIzaSyAdmBPO5iy6Gbk36GjmKKY6DMGGF3UpMQM";
$cx = "b1db9aafae126408c";
$items = [];

if (isset($_GET['search']) && !empty($_GET['search'])) {

    $search = urlencode($_GET['search']);
    $url = "https://www.googleapis.com/customsearch/v1?key=$apiKey&cx=$cx&q=$search";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resultJson = curl_exec($ch);
    curl_close($ch);

    // === Виводимо весь JSON для відладки ===
    echo "<h3>Raw API Response:</h3>";
    echo "<pre>";
    print_r($resultJson);
    echo "</pre>";

    $data = json_decode($resultJson, true);

    // Перевірка на помилку
    if (isset($data['error'])) {
        echo "<h3>API Error:</h3>";
        echo "<pre>";
        print_r($data['error']);
        echo "</pre>";
    }

    // Якщо є результати
    if (isset($data['items'])) {
        $items = $data['items'];
    } else {
        echo "<p>No results found.</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>My Browser</title>
</head>

<body>

<h2>My Browser</h2>

<form method="GET" action="index.php">
<label>Search:</label>
<input type="text" name="search" value="<?php if(isset($_GET['search'])) echo htmlspecialchars($_GET['search']); ?>">
<input type="submit" value="Search">
</form>

<hr>

<?php
// Вивід результатів
foreach ($items as $item) {
    echo "<h3><a href='".$item['link']."' target='_blank'>".$item['title']."</a></h3>";
    echo "<p>".$item['snippet']. "</p>";
}
?>

</body>
</html>