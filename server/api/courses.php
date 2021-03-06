<?php
header("Content-Type:application/json");
header("Accept: application/json");
header("CORS_ORIGIN_ALLOW_ALL: True");
header("Access-Control-Allow-Origin: *");
require "Data.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $courses = get_courses($name, $email);
    if (empty($courses)) {
        response(200, "Courses Not Found", NULL);
    } else {
        if (strpos($courses, 'Connect Error (') == true) {
            return response(400, $courses, NULL);
        }
        return response(300, "Courses Found", $courses);
    }
} else {
    echo "Invalid Request. Expected a POST request";
    return response(400, "Invalid Request", NULL);
}
function response($status, $status_message, $data)
{
    header("HTTP/1.1" . $status);
    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;
    echo "\n\n" . json_encode($response);
    return json_encode($response);
}

?>