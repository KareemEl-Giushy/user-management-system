<?php
include '../functions/input_handler.inc.php';
include '../functions/Auth.php';
include '../templates/MSG.inc.php';
include '../functions/mailer.php';
Auth::startSession();
    class Home extends Auth{
        
        public function add_note() {
        
            // Sanitize Data Input
            $inp = new input_handler();
            $title = $inp->sanitize($_POST["title"], "st");
            $note = $inp->sanitize($_POST["note"], "st");
            
            // Validate Data Input
            if(!empty( $inp->validate($title, ['empty']) )) {
                $err = "Note Title Can't Be Empty";
            }
            if(empty($err)) {

                $stmt = $this->conn->prepare("INSERT INTO notes (`uid`, `title`, `note`)VALUES(:userid, :title, :note)");
                $stmt->execute([
                    "userid" => $_SESSION["info"]["id"],
                    "title" => $title,
                    "note" => $note
                ]);
            }else {
                echo $err;
            }
        }

        public function get_notes() {
            $stmt = $this->conn->prepare("SELECT * FROM notes WHERE `uid` = ?");
            $stmt->execute([$_SESSION["info"]["id"]]);
            $usernotes = $stmt->fetchall(PDO::FETCH_ASSOC);

            $counter = 0;
            foreach($usernotes as $note):
            $counter++; ?>
                    <tr>
                        <td scope="row"><?php echo $counter; ?></td>
                        <td><?php echo $note["title"]; ?></td>
                        <td><?php echo strlen($note['note']) > 70 ? substr($note["note"], 0, 70) . "...." : $note['note'] ; ?></td>
                        <td>
                            <a href="#" title="View Info" class="text-success p-2"><i class="fas fa-info-circle fa-lg"></i></a>
                            <a href="#" title="Edit Note" class="text-primary p-2"><i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editnote"></i></a>
                            <a href="#" title="Delete Note" class="text-danger p-2"><i class="fas fa-trash-alt fa-lg"></i></a>
                        </td>
                    </tr>
        <?php
            endforeach;

        }

        public function edit_note() {

        }

        public function delete_note() {

        }


    // End home class
    }

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    Auth::redirect();

    $home = new Home();
    if($_POST['action'] == "add_note") {
    
        $home->add_note();

    }
    if($_POST['action'] == "get_notes") {

        $home->get_notes();

    }
    if($_POST['action'] == "edit_note") {

        $home->edit_note();

    }
    if($_POST['action'] == "delete_note") {

        $home->delete_note();

    }
}