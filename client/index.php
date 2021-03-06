<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>H200004N - CAD Assignment </title>
    <link rel="stylesheet" href="resources/css/client.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
</head>
<body>
<div class="row-fluid wid-12 head">
    <p>ENTER STUDENT DETAILS BELOW TO CHECK THEIR REGISTRATION STATUS</p>
</div>
<form method="POST" id="collectInfo">
    <fieldset>
        <div class="user">
            <div class="row-fluid">
                <label for="name">Name:</label>
                <input type="text" class="wid-12 fluid-input" name="name" id="name" required="">
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
<div class="row-fluid response_message" id="response_message">
</div>


<script src="resources/js/jquery-1.9.1.js"></script>
<script>
    $(document).ready(function () {
        $('#collectInfo').on('submit', function (e) {
            let name = $('#name').val();
            let email = $('#email').val();
            let semester = $('#semester').val();

            console.log('Submitting request: ' +name+ ' , '+email+' Semester: '+semester);
            e.preventDefault();
            $.ajax({
                crossDomain: true,
                dataType: 'json',
                type: 'POST',
                url: 'http://mtech.t-sols.com/h200004n/server/api/courses.php',
                data: {
                    'name': name,
                    'email': email,
                    'semester': semester
                },
                success: function (data) {
                    console.log(data);
                    if (data.status != 300) {
                        output = '<div class="error"> Response Message: ' + data.status_message + '</div>';
                    } else {
                        output = '<div class="success">Response Message: ' + data.status_message+'<br/><br/>';
                        output=output+'<table border="1"><thead><th>Course Code</th><th>Course Name</th><tbody>';
                        data.data.forEach(function(course){
                            output=output+'<tr><td>'+course.course_code+'</td><td>'+course.course_name+'</td>';
                        });
                        output=output+'</tbody></table>';
                        output=output + '</div>';
                        $('input[type=text]').val('');
                    }
                    $("#response_message").html(output).slideDown();
                }

            });

        });
    });

</script>
</body>
</html>
