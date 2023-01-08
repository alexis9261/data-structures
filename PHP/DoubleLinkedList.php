<?php 
/**
 * A simple node
 */
class Node {

    public $value;
    public $next;
    public $previous;

    public function __construct($value, $next = NULL, $previous = NULL) {
        $this->value = $value;
        $this->next = NULL;
        $this->previous = NULL;
    }

}

/**
 * A double linked list
 */
class DoubleLinkedList {

    public Node $head; // The head of the list
    public Node $tail; // The tail of the list

    public function __construct() {
        $this->head = NULL; // Set the head to NULL by default
        $this->tail = NULL; // Set the tail to NULL by default
    }

    /**
     * Add a node to the list
     */
    public function add($value): void
    {
        $node = new Node($value); // Create a new node with the value

        if ($this->head == NULL) { // If the head is NULL, then the list is empty
            $this->head = $node; // Set the head to the new node
            $this->tail = $node; // Set the tail to the new node
        } else {
            $this->tail->next = $node; // Set the next node of the tail to the new node
            $node->previous = $this->tail; // Set the previous node of the new node to the tail
            $this->tail = $node; // Set the tail to the new node
        }
    }

    /**
     * Update a node in the list
     */
    public function update($value, $newValue): void
    {
        $current = $this->head; // Set the current node to the head

        while ($current != NULL) { // While the current node is not NULL
            if ($current->value == $value) { // If the current node's value is equal to the value
                $current->value = $newValue; // Set the current node's value to the new value
                break;
            }

            $current = $current->next;  // Set the current node to the next node
        }
    }

    /**
     * Delete a node from the list
     */
    public function delete($value): void
    {
        $current = $this->head; // Set the current node to the head

        while ($current != NULL) { // While the current node is not NULL
            if ($current->value == $value) { // If the current node's value is equal to the value
                if ($current->previous != NULL) { // If the current node's previous node is not NULL
                    $current->previous->next = $current->next; // Set the next node of the current node's previous node to the current node's next node
                } else {
                    $this->head = $current->next; // Set the head to the current node's next node
                }

                if ($current->next != NULL) { // If the current node's next node is not NULL
                    $current->next->previous = $current->previous; // Set the previous node of the current node's next node to the current node's previous node
                } else {
                    $this->tail = $current->previous; // Set the tail to the current node's previous node
                }

                break;
            }

            $current = $current->next; // Set the current node to the next node
        }
    }

    public function print(): void
    {
        $current = $this->head; // Set the current node to the head

        while ($current != NULL) { // While the current node is not NULL
            echo $current->value . " "; // Print the current node's value
            $current = $current->next; // Set the current node to the next node
        }
    }

    public function printReverse(): void
    {
        $current = $this->tail; // Set the current node to the tail

        while ($current != NULL) { // While the current node is not NULL
            echo $current->value . " "; // Print the current node's value
            $current = $current->previous; // Set the current node to the previous node
        }
    }

    public function search(mixed $value): bool
    {
        $current = $this->head; // Set the current node to the head

        while ($current != NULL) { // While the current node is not NULL
            if ($current->value == $value) { // If the current node's value is equal to the value
                return true; // Return true
            }

            $current = $current->next; // Set the current node to the next node
        }

        return false; // Return false
    }


}