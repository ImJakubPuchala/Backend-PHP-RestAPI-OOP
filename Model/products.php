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
        http_response_code(202);
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
        http_response_code(202);
    }

    public function Insert($name, $price, $comments)
    {
        if($name && is_numeric($price) && $comments){
            $sql = new DataBase();
            $sql->query("INSERT INTO `product`(`name`, `price`, `comments`) VALUES ('$name',$price,'$comments')");
            $sql->close();
            http_response_code(202);
        }else{
            http_response_code(400);
            echo"Error in variable";
        }
    }

    public function Delete($id)
    {
        if(is_numeric($id)){
            $sql = new DataBase();
            $sql->query("DELETE FROM product WHERE id = $id");
            $sql->close();
            http_response_code(202);
        }else{
            http_response_code(400);
            echo"Error in variable";
        }
    }

    public function Update($id, $name, $price, $comments)
    {
        if($name && is_numeric($price) && $comments && is_numeric($id)){
            $sql = new DataBase();
            $sql->query("UPDATE `product` SET `name`='$name',`price`='$price',`comments`='$comments' WHERE `id`=$id");
            $sql->close();
            http_response_code(202);
        }else{
            http_response_code(400);
            echo"Error in variable";
        }
    }
}

?>