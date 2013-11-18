<?php
//require 'class.Address.inc';
//require 'class.Database.inc';

/**
 * Define Autoload Files
 * @param $class_name
 */
function __autoload($class_name){
    include 'class.' . $class_name . ".inc";
}

echo '<h2>Instantiating AddressResidence</h2>';
$address_residence = new AddressResidence();

//echo '<h2>Empty Address</h2>';
//echo '<tt><pre>' . var_export($address, TRUE). '</pre></tt>';

echo '<h2>Setting properties...</h2>';
$address_residence->street_address_1 = '555 Fake Street';
$address_residence->city_name = 'Townsville';
$address_residence->subdivision_name = 'State';
$address_residence->postal_code = '12345';
$address_residence->country_name = 'United States of America';
//$address_residence->address_type_id = 1; // validate input and set protected property

echo '<tt><pre>' . var_export($address_residence, TRUE). '</pre></tt>';
//
//echo '<h2>Displaying Address</h2>';
//echo $address->display();
echo $address_residence;

//echo '<h2>Testing protected access.</h2>'; //failed due to protected access property
//echo "Address ID: {$address->_address_id}";

/*echo '<h2>Testing Magic __get and __set</h2>';
unset($address_residence->postal_code);
echo $address_residence->display();
//echo $address->_postal_code;*/



echo '<h2>Testing Address __construct with an array</h2>';
$address_business = new AddressBusiness(array(
    'street_address_1' => '123 Phony Ave',
    'city_name' => 'Villageland',
    'subdivision_name' => 'Region',
    'postal_code' => '67890',
    'country_name' => 'Canada',
));
echo $address_business->display();

//echo '<h2>Address __toString</h2>';
echo $address_business;
echo '<tt><pre>'.var_export($address_business, TRUE).'</pre>';

echo '<h2>Instantiating AddressPark</h2>';
$address_park = new AddressPark(array(
    'street_address_1' => '789 Missing Circle',
    'street_address_2' => 'Suite 0',
    'city_name' => 'Hamlet',
    'subdivision_name' => 'Territory',
    'country_name' => 'Australia',
));
echo $address_park;
echo '<tt><pre>' . var_export($address_park, TRUE) . '</pre></tt>';



/**
 * Typecasting,
 */
//echo '<h2>Testing typecasting to an object</h2>';
//$test_object = (object) array(
//    'hello' => 'world',
//    'nested' => array('key' => 'value'),
//); //key strings fine

//$test_object = (object) 12345; //stored as scalar=>12345;
//
//echo '<tt><pre>' . var_export($test_object, TRUE) . '</pre></tt>';

echo '<h2>Loading from database</h2>';
try{
    $address_db = Address::load(0);
    echo '<tt><pre>' . var_export($address_db, TRUE) . '</pre></tt>';
}
catch(ExceptionAddress $e){
    echo $e;
}

//echo '<h2>Loading again from database</h2>';
//$address_db2 = Address::load(2);
//echo '<tt><pre>' . var_export($address_db2, TRUE) . '</pre></tt>';



?>






<div id="bottomDweller">
    <style type="text/css">
        #bottomDweller{
            height: 200px;
        }
    </style>
</div>

<script type="text/javascript">
    setTimeout(scrollTilBottom, 200);

    function scrollTilBottom(){
        window.scrollTo(0, document.body.scrollHeight);
    }


</script>