<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/13/13
 * Time: 11:58 PM
 * To change this template use File | Settings | File Templates.
 */

/**
 * Park Address
 */
class AddressPark extends Address{
    protected function _init(){
        $this->_setAddressTypeId(Address::ADDRESS_TYPE_PARK);
    }

    /**
     * Overriding
     * - is redeclaring method, property, or constant
     * - can define new or altered behavior
     * - cannot specify stricter
     */
//    public $country_name = 'Australia';

    /**
     * Overriding
     * - Constants: just redeclare it, cannot redeclared in interface
     * - methods: new method must have same number of arguments, except constructors, can call parent class methods and properties.
     *
     */


//    public function display(){
//        $output = '<div style="background-color: PaleGreen; padding: 20px;">';
//        $output .= parent::display();
//        $output .= '</div>';
//        return $output;
//    }
}