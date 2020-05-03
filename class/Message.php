
<?php

class Message
{

public function inform($event) {

    switch ($event){
        case "Added": {
            print "Your meal has been added.";
        }

        case "Updated": {
            print "Your meal has been updated.";
        }

    }
}

}

?>