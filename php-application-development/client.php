<!DOCTYPE html>
<html>
<head>
    <title>H200004N - CAD Assignment </title>
</head>

<body>
<?php
// building array of variables
$content = http_build_query(array(
    'name' => 'station wagon',
));

// creating the context change POST to GET if that is relevant
$context = stream_context_create(array(

    'http' => array(
        //'header' => 'Content-type: application/json',
        'method' => 'POST',
        'content' => $content,)));
$response = file_get_contents('http://localhost/api/server.php', NULL, $context);
?><p><?php

echo $response;

$output = json_decode($response, true);

var_dump($output);

?><p><?php

    echo 'Status Code:' . $output['status'];

    ?><br><?php

echo 'Status Message: ' . $output['status_message'];

//foreach($output['data'] as $output['data']){

?><p><?php
    echo 'Product Description:' . $output['data']['description'];
    ?><br><?php
    echo 'Product Drive:' . $output['data']['drive'];
    ?><br><?php

    echo 'Product Types:';

    foreach ($output['data']['types'] as $output['data']['types']) {

        ?><br><?php

        echo $output['data']['types'];

    }

    //}

    ?>
</body>
</html>