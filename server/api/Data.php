<?php
    function get_courses($name, $email)
    {
        $courses_response = array();
        $db = 'tinbee00_h200004n_assign1';
        $mysqli = new mysqli('204.93.193.125', 'tinbee00_h200004', 'tinbee00_h200004', $db,'3306');
        $sql = "SELECT c.course_code,c.course_name FROM  registered_courses c LEFT JOIN students s ON s.id=c.students_id WHERE s.email='" . $email . "' AND s.name='" . $name . "'";
        if ($mysqli->connect_error) {
         return 'Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error();
        } else {
            $students = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_array($students)) {
                $course_code = $row['course_code'];
                $course_name = $row['course_name'];
                $course = array("course_code" => $course_code, "course_name" => $course_name);
                array_push($courses_response, $course);
            }
        }
        return $courses_response;
    }


?>