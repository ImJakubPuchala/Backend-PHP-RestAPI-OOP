<?php 

class product{
    public $id;
    public $name;
    public $price;
    public $comments;

    function __construct($id, $name, $price, $comments)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->comments = $comments;
    }

    function __toString()
    {
        return "$this->id | $this->name | $this->price | $this->comments <br/>";
    }
}