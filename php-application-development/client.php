<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>H200004N - CAD Assignment </title>
    <link rel="stylesheet" href="resources/css/client.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<form action="#" method="POST">
    <div class="user">
        <div class="row-fluid">
            <label for="name">Name:</label>
            <input type="text" class="wid-12 fluid-input" name="name " id="name" required="">
        </div>
        <div class="row-fluid">
            <label for="email">E-mail:</label>
            <input type="email" class="wid-12 fluid-input" name="email" id="email" required="">
        </div>
        <div class="row-fluid">
            <label for="semester">Semester:</label>
            <select name="semester" required class="wid-12 fluid-input" id="semester">
                <option value="">Select Semester</option>
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
            </select>
        </div>
        <div class="row-fluid">
            <input type="submit" class="wid-6 submit" class="submit" value="Send..">
            <input type="button" class="wid-6 cancel" class="submit" value="Cancel">
        </div>
    </div>
</form>

<?php
$output = NULL;
if (isset($_POST)) {
$name = $_POST['name'];
$email = $_POST['email'];
$semester = $_POST['semester'];
// building array of variables
$content = http_build_query(array(
    'name' => $name, 'email' => $email, 'semester' => $semester,
));

// creating the context change POST to GET if that is relevant
$context = stream_context_create(array(
    'http' => array(
        'header' => 'Content-type: application/json',
        'method' => 'POST',
        'content' => $content,)));
$response = file_get_contents('http://localhost/api/server.php', NULL, $context);
if (isset($response)) {
?><p><?php
    $output = json_decode($response, true);
    if (isset($output)) {
        var_dump($output);
    }
    }

    }

    ?>

    <?php
    if (isset($output)) {
    echo '<br>Status Code:' . $output['status'];
    ?><br><?php
echo 'Status Message: ' . $output['status_message'];

foreach ($output['data'] as $output['data']){
?><p><?php
    echo 'Name' . $output['data']['name'];
    ?><br><?php
    echo 'Email:' . $output['data']['email'];
    ?><br><?php

    echo 'Courses:';
    foreach ($output['data']['courses'] as $output['data']['courses']) {
        ?><br><?php
        echo $output['data']['courses'];
    }

    }

    }
    ?>

</body>
</html>