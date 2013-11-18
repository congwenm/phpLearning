<?php 
/*	class PhysicalAddress{}
	class Physical_Address{}
	class physical_address{}
	class 21_jump_street{}
*/
/**
 * Physical Address
 */
/*	class Address{
		public $streetName;
		public $subdivision_name = 'California';
		public $_city;
		public $time_updated = time();  //invalid due to not default assigned to a constant but rather a function
		public $-addressId;             //invalid syntax -
        public $city_copy = $_city;     //invalid initialization, runtime evaluation
	}*/
    abstract class Address implements Model{

        //Amount types
        static public $valid_address_types = array(
            Address::ADDRESS_TYPE_RESIDENCE => 'Residence',
            Address::ADDRESS_TYPE_BUSINESS =>'Business',
            Address::ADDRESS_TYPE_PARK => "Park",
        );

        /*  Static method similar to regular methods
         *  - naming convention
         *  - scope
         *  - returns a value
         *  Different
         *  - cannot use $this, actually uses self::$property
         *  - self::$property (static property) can be accessed through regular functions (I think)
         */

        /**
         * Determine if an address type is valid
         * @param int $address_type_id
         * @return boolean
         */
        static public function isValidAddressTypeId($address_type_id){
            return array_key_exists($address_type_id, self::$valid_address_types);
        }

        /**
         * if valid, set the address type id.
         * @param int $address_type_id
         */
        protected function _setAddressTypeId($address_type_id){
            if(self::isValidAddressTypeId($address_type_id)){
                $this->_address_type_id = $address_type_id;
            }
        }



        /*  Class Constants
         *  - properties that never change
         *      . error codes
         *      . data structure names
         *      . ALL_CAPS_SEPERATED_BY_UNDERSCORES
         *      . no arrays
         */
        const ADDRESS_TYPE_RESIDENCE = 1;
        const ADDRESS_TYPE_BUSINESS = 2;
        const ADDRESS_TYPE_PARK = 3;

        const ADDRESS_ERROR_NOT_FOUND = 1000;

        // Street address
        public $street_address_1;
        public $street_address_2;

        // Name of the City
        public $city_name;

        // Name of the subdivision
        public $subdivision_name;

        // Postal code
        protected $_postal_code;

        // Name of the Country.
        public $country_name;

        // Primary key of an Address.
        protected $_address_id;

        //  Address type id.
        protected $_address_type_id;

        //When the record was created and last updated.
        protected $_time_created;
        protected $_time_updated;

        /**
         * Post clone behavior
         */
        function __clone(){
            // for demo purpose, set _time_created and _time_updated to obvious values;
            $this->_time_created = time();
            $this->_time_updated = NULL;
        }


        /**
         * __construct() and __toString() are magic methods, a dozen more, fail safe,
         */

        /**
         * Constructor.
         * @param array $data Optional array of property names and values.
         */
        function __construct($data=array()){
            $this->_init();
            $this->_time_created = time();

            // Ensure that the Addres can be populated
            if(!is_array($data)){
                trigger_error('unable to contruct address with a ' . get_class($name));
            }

            // If there is at least one value, populate the Address with it.
            if (count($data) > 0){
                foreach($data as $name => $value){
                    // Special case for protected properties.
                    if (in_array($name, array(
                        'time_created',
                        'time_updated',
                        'address_id',
                        'address_type_id',
                    ))){
                        $name = '_' . $name;
                    }
                    $this->$name = $value;
                }
            }
        }


        /**
         * Magic __get.
         * @param string $name
         * @return mixed
         */
        function __get($name){
            //Postal code lookup if unset.
//            trigger_error('Undefined Variable'. $name);
//            echo '<h1>Unable to get '. $name.'</h1>';
            if(!$this->_postal_code){
//                echo"<b>Postal Code is: {$this->_postal_code}</b><br/>"; //Undefined?? Property due to protected;
                $this->_postal_code = $this->_postal_code_guess();
                //expose any protected variable that start with _ as readonly
            }

            //Attempt to return a protected property by name.
            $protected_property_name = '_'.$name;
            if(property_exists($this, $protected_property_name)){
//                echo '<br/>Called for protect version after not able to get: '.$name.'</br/>';
                return $this->$protected_property_name;
            }

            //Unable to access property: trigger error
            trigger_error('Undefined property via __get: '. $name);
            return NULL;
        }

        /**
         * Magic __set
         * @param string $name
         * @param mixed $value
         */
        function __set($name, $value){
            //Only set valid address type id.

            /*Removed for having abstract method _init call the _setAddressTypeId*/
//            if ('address_type_id' == $name){
//                $this->_setAddressTypeId($value);
//                return;
//            }

            //Allow anything to set the Postal code
            if('postal_code' == $name){
                $this->$name = $value;
                return;
            }

            //Unable to access property: trigger error //only support postal code
            trigger_error('Undefined or unallowed property via __set();' .$name);
        }

        /**
         * Magic __toString.
         * @return String
         */
        function __toString(){
            return $this->display();
        }

        /**
         * Force extending classes to implement init method.
         * @return mixed
         */
        abstract protected function _init();

        /**
         * Guess the postal code given the subdivision and city name.
         * @todo Replace with a database lookup.
         * @return string
         */
        protected function _postal_code_guess(){
//            return 'LOOKUP';
            $db = Database::getInstance();
            $mysqli = $db->getConnection();

            $sql_query = 'SELECT postal_code ';
            $sql_query .= 'FROM location ';

            $city_name = $mysqli->real_escape_string($this->city_name);
            $sql_query .= 'WHERE city_name = "' . $city_name . '" ';

            $subdivision_name = $mysqli->real_escape_string($this->subdivision_name);
            $sql_query .= ' AND subdivision_name = "' . $subdivision_name . '" ';

            $result = $mysqli->query($sql_query);

            if ($row = $result->fetch_assoc()){
                return $row['postal_code'];
            }
        }

        /**
         *  Display an address in HTML.
         *  @return String
         */
        function display(){
            $output = '';

            $output .= $this->street_address_1;
            if ($this->street_address_2){
                $output .= '<br/>' . $this->street_address_2;
            }
            $output .= '<br/>';
            $output .= $this->city_name . ', ' . $this->subdivision_name;
            $output .= ' '.$this->postal_code;

            //Country
            $output .= '<br/>';
            $output .= $this->country_name;

            return $output;
        }

        /**
         * Final because we don't want the child classes to implement a variation of this method
         * @param int $address_id
         * @return mixed|void
         */
        final public static function load($address_id){
            $db = Database::getInstance();
            $mysqli = $db->getConnection();

            $sql_query = 'SELECT location.* ';
            $sql_query .= 'FROM location ';
            $sql_query .= 'WHERE address_id = "' . (int) $address_id . '" ';

            $result = $mysqli->query($sql_query);
//            $result = mysqli_query($mysqli, $sql_query);
            if (!$result) { echo '<tt><pre>' . 'WTF is GOING ON??' . '</pre></tt>';}

//            if ($row = $result->fetch_object()){ //standard object
//                var_dump($row);
//                exit();
//            }
            if ($row = $result->fetch_assoc()){
                return self::getInstance($row['address_type_id'], $row);
            }
            throw new ExceptionAddress('Address not found.', self::ADDRESS_ERROR_NOT_FOUND);
        }

        /**
         * Given an address_type_id, return an instance of that subclass.
         * @param int $address_type_id
         * @param array $data
         * @return Address subclass
         */

        final public static function getInstance($address_type_id, $data=array()){
            $class_name = 'Address' . self::$valid_address_types[$address_type_id];
            echo 'class_name: ' . $class_name;
            return new $class_name($data);
        }

        /**
         * Save an Address.
         */
        final public function save(){

        }

    }
 ?>