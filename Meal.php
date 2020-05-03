
<?php

class Meal
{

public function listMeals() {

    global $conn;
    global $_SESSION;

    $sql ="
select description from meals
";

    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
            echo "desc1: " . $row["description"]. " <br>";
        }

}

}

?>