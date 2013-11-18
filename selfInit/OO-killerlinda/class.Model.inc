<?php

/**
 * Shared INterface for interactions.
 * - Every method in interface is abstract and public
 * - can have constants
 * - specifies methods that a class must implement
 * - is similar to abstract class
 * - can extend another interface
 */
interface Model{

    /**
     * Load a Model
     * @param int $address_id
     * @return mixed
     */
    static function load($address_id);

    /**
     * Save a model
     */
    function save();
}