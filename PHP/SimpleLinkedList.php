<?php

/**
 * A simple node
 */
class Node
{

    public $value; // The value of the node
    public $next; // The next node

    public function __construct($value, $next = NULL)
    {

        $this->value = $value; // Set the value of the node
        $this->next = NULL; // Set the next node to NULL by default

    }
}

/**
 * A simple linked list
 */
class SimpleLinkedList
{

    public ?Node $head; // The head of the list
    public ?Node $tail; // The tail of the list

    public function __construct()
    {

        $this->head = NULL; // Set the head to NULL by default
        $this->tail = NULL; // Set the tail to NULL by default

    }

    /**
     * Adds a value to the linked list
     */
    public function add($value)
    {

        $node = new Node($value); // Create a new node with the value

        if ($this->head == NULL) { // If the head is NULL, then the list is empty

            $this->head = $node; // Set the head to the new node
            $this->tail = $node; // Set the tail to the new node

        } else { // If the head is not NULL, then the list is not empty

            $this->tail->next = $node; // Set the next node of the tail to the new node
            $this->tail = $node; // Set the tail to the new node

        }
    }

    /**
     *  Updates a value in the linked list
     */
    public function update($value, $newValue)
    {

        $current = $this->head; // Set the current node to the head

        while ($current != NULL) { // While the current node is not NULL

            if ($current->value == $value) { // If the current node's value is equal to the value

                $current->value = $newValue; // Set the current node's value to the new value
                return; // Return

            }

            $current = $current->next; // Set the current node to the next node

        }
    }

    /**
     * Searches for a value in the linked list
     */
    public function search($value)
    {

        $current = $this->head; // Set the current node to the head
        
        while ($current != NULL) { // While the current node is not NULL
            
            if ($current->value === $value) { // If the current node's value is equal to the value
                return true;
            }

            $current = $current->next; // Set the current node to the next node

        }

        return false;

    }

    /**
     * Prints the values of the linked list
     */
    public function print()
    {

        $current = $this->head; // Set the current node to the head

        while ($current != NULL) { // While the current node is not NULL

            echo $current->value . " "; // Print the value of the current node
            $current = $current->next; // Set the current node to the next node

        }
    }

    /**
     * Removes a value from the linked list
     */
    public function remove($value)
    {

        $current  = $this->head; // Set the current node to the head
        $previous = NULL; // Set the previous node to NULL

        while ($current != NULL) { // While the current node is not NULL

            if ($current->value == $value) { // If the current node's value is equal to the value

                if ($previous == NULL) { // If the previous node is NULL

                    $this->head = $current->next; // Set the head to the next node

                } else { // If the previous node is not NULL

                    $previous->next = $current->next; // Set the next node of the previous node to the next node of the current node

                }

                if ($current->next == NULL) { // If the next node of the current node is NULL

                    $this->tail = $previous; // Set the tail to the previous node

                }

                return; // Return

            }

            $previous = $current; // Set the previous node to the current node
            $current = $current->next; // Set the current node to the next node

        }
    }

    /**
     * Returns the values of the linked list as a string
     */
    public function __toString()
    {

        $current = $this->head; // Set the current node to the head
        $string  = ""; // Set the string to an empty string

        while ($current != NULL) { // While the current node is not NULL

            $string .= $current->value . " "; // Add the value of the current node to the string
            $current = $current->next; // Set the current node to the next node

        }

        return $string; // Return the string

    }
}
