<?php
header("Content-Type:application/json");
require "Data.php";
if (!empty($_GET['name'])) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $semester = $_GET['semester'];
    echo "Server";
    $courses = get_courses($name, $email, $semester);
    if (empty($courses)) {
        response(200, "Courses Not Found", NULL);
    } else {
        response(300, "Courses Found", $courses);
    }

} else {
    response(400, "Invalid Request", NULL);
}
function response($status, $status_message, $data)
{
    header("HTTP/1.1" . $status);
    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;
    $json_response = json_encode($response);
    echo $json_response;
}

?>