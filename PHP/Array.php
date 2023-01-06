<?php 

/**
 * A simple array
 */
class MyArray {

    public $array;

    public function __construct() {
        $this->array = array();
    }

    public function add($value) {
        $this->array[] = $value;
    }

    public function update($value, $newValue) {
        $index = array_search($value, $this->array);

        if ($index !== FALSE) {
            $this->array[$index] = $newValue;
        }
    }

    public function delete($value) {
        $index = array_search($value, $this->array);

        if ($index !== FALSE) {
            unset($this->array[$index]);
        }
    }

    public function print() {
        print_r($this->array);
    }

    public function printReverse() {
        print_r(array_reverse($this->array));
    }

}