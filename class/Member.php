
<?php

class Member
{

function getMemberById($memberId)
{

    global $conn;
    $sql = "select display_name as name FROM registered_users WHERE id = '$memberId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["name"];
    }
}

public function processLogin($username, $password) {

    global $conn;
    global $_SESSION;

        $passwordHash = md5($password);
        $sql = "select id FROM registered_users WHERE user_name = '$username' AND password = '$passwordHash'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $_SESSION["userId"] = $row["id"];
        }
}

}

?>