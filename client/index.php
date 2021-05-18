<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>H200004N - CAD Assignment </title>
    <link rel="stylesheet" href="resources/css/client.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
        function process_form(a,b){

        }
    </script>
</head>
</head>
<body>
<div class="row-fluid wid-12 head">
    <p>ENTER STUDENT DETAILS BELOW TO CHECK THEIR REGISTRATION STATUS</p>
</div>
<form method="POST" action="#">
    <fieldset>
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
    </fieldset>
</form>


<?php
if (isset($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $semester = $_POST['semester'];
    $opts = array(
        'http' => array(
            'method' => "POST",
            'header' => "Accept-language: en",
            'header' => 'Content-type: application/json'
        )
    );
    $context = stream_context_create($opts);
    $response = file_get_contents("http://mtech.t-sols.com/h200004n/server/api/courses", false, $context);
    $output = json_decode($response, true);
    if (isset($output)) {
        echo 'Status Code:' . $output['status'];
    }
}
?>

</body>

</html>
