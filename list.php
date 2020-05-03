<br/><a href="./">Return</a>
<?php

$sql ="
select description from meals
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "desc: " . $row["description"]. " <br>";
    }
} else {
    echo "0 results";
}

?><br/><a href="./">Return</a>