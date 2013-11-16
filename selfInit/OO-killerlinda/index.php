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
$address_residence->address_type_id = 1; // validate input and set protected property

echo '<tt><pre>' . var_export($address_residence, TRUE). '</pre></tt>';
//
//echo '<h2>Displaying Address</h2>';
//echo $address->display();
echo $address_residence;

//echo '<h2>Testing protected access.</h2>'; //failed due to protected access property
//echo "Address ID: {$address->_address_id}";

echo '<h2>Testing Magic __get and __set</h2>';
unset($address_residence->postal_code);
echo $address_residence->display();
//echo $address->_postal_code;



echo '<h2>Testing Address __construct with an array</h2>';
$address_business = new AddressBusiness(array(
    'street_address_1' => '123 Phony Ave',
    'city_name' => 'Villageland',
    'subdivision_name' => 'Region',
    'postal_code' => '67890',
    'country_name' => 'Canada',
));
echo $address_business->display();

echo '<h2>Address __toString</h2>';
echo $address_business;
echo '<tt><pre>'.var_export'</pre>'


//echo '<tt><pre>'. var_export($address->valid_address_types, TRUE).'</pre></tt>'; //error
/*  Scope Resolution Operator ::
 *  - for static you need to use Obj :: method/$property
 *  - for getting static, constant and overriden functions
 */
/*echo '<h2>Displaying address types ... </h2>';
echo '<tt><pre>'. var_export($address::$valid_address_types, TRUE).'</pre></tt>';

echo '<h2>Testing address type ID validation</h2>';
for ($id = 0; $id <= 4; $id++){
    echo "<div>$id: ";
    echo Address::isValidAddressTypeId($id) ? 'Valid' : 'Invalid';
    echo "</div>";
}*/


$arr = [1,2,3,4,5,6];
for ($i = 0; $i < 7; $i ++){
    if(array_key_exists($i, $arr)){
        echo $i;
    }
}

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