<?php

header("Content-Type:application/json");

require "data.php";



if(!empty($_POST['name']))

{

    $name=$_POST['name'];

    $products =get_product($name);



    if(empty($products))

    {

        response(200,"Product Not Found",NULL);

    }

    else

    {

        response(300,"Product Found",$products);

    }



}

else

{

    response(400,"Invalid Request",NULL);

}
function response($status,$status_message,$data)
{header("HTTP/1.1".$status);

    $response['status']=$status;
    $response['status_message']=$status_message;
    $response['data']=$data;

    $json_response=json_encode($response);
    echo $json_response;


}
?>