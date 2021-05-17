<?php
function get_product($name)
{
    $products = array(
        array(	"description"=>"sports cars",
            "drive"=>2,
            "types"=>array("Porsche 911","Porsche 718 Cayman")),
        array(	"description"=>"station wagon",
            "drive"=>4,

            "types"=>array("Volvo V60","Volvo V90")),

        array(	"description"=>"hatchback",

            "drive"=>4,

            "types"=>array("Volkswagen Golf","Honda Civic")),

        array(	"description"=>"suv",

            "drive"=>4,

            "types"=>array("Audi Q5","BMW X3","Jaguar F-Pace","Skoda Kodiaq"))


    );


    foreach($products as $product)

    {

        if($product['description']==$name)

        {

            return $product;

            break;

        }

    }
}
?>