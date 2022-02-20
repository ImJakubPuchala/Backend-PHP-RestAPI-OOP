<?php


class products{
    public $objects = [];

    function __construct()
    {
    }

    public function SelectAll()
    {
        $sql = new DataBase();
        $data = json_decode($sql->fetch("select * from product"));
        foreach($data as $row){
            array_push($this->objects, new product($row->id, $row->name, $row->price, $row->comments));
        }
        //PRINT ARRAY
        print_r(json_encode($this->objects));
        $sql->close();
    }

    public function Select($id)
    {
        // if(!is_numeric($id)) die("is NOT numeric!");
        $sql = new DataBase();
        $data = json_decode($sql->fetch("select * from product where 'id' = $id"));
        foreach($data as $row){
            array_push($this->objects, new product($row->id, $row->name, $row->price, $row->comments));
        }
        //PRINT ARRAY
        print_r(json_encode($this->objects));
        $sql->close();
    }

    public function Insert($name, $price, $comments)
    {
        if($name && is_numeric($price) && $comments){
            $sql = new DataBase();
            $sql->query("INSERT INTO `product`(`name`, `price`, `comments`) VALUES ('$name',$price,'$comments')");
            $sql->close();
        }else{
            echo"Error in variable";
        }
    }
}

?>