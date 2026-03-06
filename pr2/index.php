<?php

$apiKey = "103c497f15b8437782db1f5aa7620d6327a1f6af";
$items = [];

if (isset($_GET['search']) && !empty($_GET['search'])) {

    $search = $_GET['search'];

    $data = json_encode([
        "q" => $search
    ]);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://google.serper.dev/search");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "X-API-KEY: $apiKey",
        "Content-Type: application/json"
    ]);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $result = curl_exec($ch);
    curl_close($ch);


    $response = json_decode($result, true);

    if (isset($response['organic'])) {
        $items = $response['organic'];
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

<form method="GET">
<label>Search:</label>
<input type="text" name="search">
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