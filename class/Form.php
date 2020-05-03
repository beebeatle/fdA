
<?php

class Form
{

    public function mealAdd() {
?>

        <form action="./" method="post" id="frmAdd">
            Description: <input name="meal_description" id="meal_description" type="text"/>
            <br/> <input type="submit" name="add_new" value="Add"/>
        </form>

 <?php
    }


    public function mealEdit($meal_id, $descr) {
?>
        <form action="./" method="post" id="frmAdd">
            Description: <input name="meal_description" id="meal_description" type="text" value ="<?php print $descr?>"/>
            <input type="hidden" name="meal_id" value="<?php print $meal_id?>"/>
            <br/> <input type="submit" name="meal_update" value="Update"/>
        </form>


        <?php

}

}

?>