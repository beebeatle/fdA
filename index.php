
<?php

require_once "./config/config.php";
include "./class/Member.php";
include "./class/Message.php";
include "./class/Meal.php";
include "./class/Layout.php";
include "./class/Form.php";

$conn = new mysqli($servername, $username, $password, $dbname);
if (mysqli_connect_errno())trigger_error("Problem with connecting to database.");

session_start();

if(!empty($_SESSION["userId"]))$user_id=$_SESSION["userId"];

if(!empty($_GET['page']))$mode=$_GET['page'];
elseif (isset( $_POST['add_new'] ))$mode='add-process';
elseif (isset( $_POST['meal_update'] ))$mode='edit-update';
elseif (isset( $_POST['login'] ))$mode='login-process';
elseif(!empty($user_id))$mode='dashboard';
else $mode='login-enter';

$member=new Member();
$meal=new Meal();
$layout=new Layout();
$message=new message();
$form=new form();

switch ($mode){
    case 'login-enter':{
        require_once "./view/login-form.php";
        break;
    }

    case 'login-process':{
        if($member->processLogin($_POST['user_name'], $_POST['password']))
        header("Location: index.php");
        else  require_once "./view/login-error.php";
        break;
    }

    case 'dashboard':{
        require_once "./view/dashboard.php";
        break;
    }

    case 'add':{
        $form->mealAdd();
        $layout->footer();
        break;
    }
    case 'add-process':{
        $meal->addMeal( $_POST['meal_description'], $user_id);
        $message->inform("Added");
        $layout->footer();
        break;
    }

    case 'edit':{
        $meal_id=$_GET['id'];
        $form->mealEdit($meal_id,$meal->getMeal($meal_id));
        $layout->footer();
        break;
    }

    case 'edit-update':{
        $meal_id=$_POST['meal_id'];
        $meal_descr=$_POST['meal_description'];

        if($meal->mealUpdate($meal_id,$meal_descr))$message->inform("Updated");

        $layout->footer();
        break;
    }

    case 'view':{
        $meal->listMeals($user_id);
        $layout->footer();
        break;
    }

}


$conn->close();

?>