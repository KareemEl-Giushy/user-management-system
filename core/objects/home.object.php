<?php
include '../functions/input_handler.inc.php';
include '../functions/Auth.php';
include '../templates/MSG.inc.php';
include '../functions/mailer.php';

    class home {
        
        public function add_note() {
        
            // Sanitize Data Input
            $inp = new input_handler();
            $title = $inp->sanitize($_POST["title"], "st");
            $note = $inp->sanitize($_POST["note"], "st");
            
            // Validate Data Input
            if(!empty( $inp->validate($title, ['empty']) )) {
                $err = "Note Title Can't Be Empty";
            }

        }

        public function edit_note() {

        }

        public function delete_note() {

        }


    // End home class
    }

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $home = new home();
    if($_POST['action'] == "add_note") {
    
        $home->add_note();

    }
    if($_POST['action'] == "edit_note") {

        $home->edit_note();

    }
    if($_POST['action'] == "delete_note") {

        $home->delete_note();

    }
}