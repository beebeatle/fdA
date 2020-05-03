
<?php

class Meal
{

public function listMeals($user_id) {

    global $conn;
    global $_SESSION;

    $sql ="
select description, uuid from meals where user_id='$user_id'
";

    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
            echo "desc1: ". $row["description"]." <a href='./?page=edit&id=". $row["uuid"]."'>edit</a><br>";
        }

}

    public function getMeal($meal_id) {

        global $conn;

       $sql ="
select description from meals where uuid='$meal_id'
";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row["description"];


    }


    public function addMeal($descripton,$user_id) {
        global $conn;
       $sql ="
            insert into meals (description, user_id) value ('$descripton','$user_id');
            ";
        return $result = $conn->query($sql);
    }

    public function mealUpdate($meal_id,$meal_descr) {
        global $conn;
         $sql ="
            update meals set description='$meal_descr' where uuid='$meal_id'
            ";
        return $result = $conn->query($sql);
    }



}

?>