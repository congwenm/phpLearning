<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/13/13
 * Time: 11:57 PM
 * To change this template use File | Settings | File Templates.
 */

/**
 * Resident Address
 */
class AddressResidence extends Address {

    /**
     * Initialization
     */
    protected function _init(){
        $this->_setAddressTypeId(Address::ADDRESS_TYPE_RESIDENCE);
    }
}