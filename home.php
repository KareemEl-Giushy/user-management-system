<?php
    include 'core/functions/Auth.php';
    include 'core/templates/Page.inc.php';
    ob_start();
    $user = new Auth();
    $user->startsession();
    $user->redirect();
    $userinfo = $user->userinfo($_SESSION['user-email']);
    $stmt = $user->conn->prepare("SELECT * FROM notes WHERE `uid` = ?");
    $stmt->execute([$_SESSION["info"]["id"]]);
    $usernotes = $stmt->fetchall(PDO::FETCH_ASSOC);

    // Testing :
    // echo '<pre>';
    // var_dump($userinfo);
    // echo '</pre>';
    
    $page = new Page();
    $page->header("Home");
    $page->navbar($userinfo['first_name']);
 ?>

<div class="container">
    <?php if($userinfo['verify'] > 0):?>
    <div class="alert alert-success alert-dismissible text-center mt-2">
        <button class="close" data-dismiss="alert">&times;</button>
        <i class="far fa-check-square"></i> Email Address Is verified successfully
    </div>
    <?php else:?>
    <div class="alert alert-warning alert-dismissible text-center mt-2">
        <button class="close" data-dismiss="alert">&times;</button>
        <i class="fas fa-exclamation-triangle"></i> Email Address Is <strong> Not verified</strong>
    </div>
    <?php endif;?>
    <h3 class='text-light text-center my-4'>Write Your Notes Here !</h3>
    <div class="card">
        <h4 class="card-header d-flex justify-content-between">
            <span class=''>All Notes</span>
            <button class="btn btn-primary" data-toggle='modal' data-target="#addnote"><i class="fas fa-plus-circle fa-lg"></i>&nbsp;Add A Note</button>
        </h4>
        <div class="card-body">
            <table class="table table-striped table-responsive-md table-hover" id='datatable'>
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Note Title</th>
                    <th scope="col">The Note</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <?php 
                        $counter = 0;
                        foreach($usernotes as $note):
                        $counter++;
                        ?>
                    <tr>
                        <td scope="row"><?php echo $counter; ?></td>
                        <td><?php echo $note["title"]; ?></td>
                        <td><?php echo $note["note"]; ?></td>
                        <td>
                            <a href="#" title="View Info" class="text-success p-2"><i class="fas fa-info-circle fa-lg"></i></a>
                            <a href="#" title="Edit Note" class="text-primary p-2"><i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editnote"></i></a>
                            <a href="#" title="Delete Note" class="text-danger p-2"><i class="fas fa-trash-alt fa-lg"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Start Modal Add -->
    <div class="modal fade" id="addnote">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title">Add New Note</h5>
                    <button class="close text-light" type="button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="" action="#" method="post" id="add-note-form">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Note Title" required>
                        </div>
                        <div class="form-group">
                            <textarea name="note" cols="30" rows="10" placeholder="Note ..." class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- End Madal Add -->
    <!-- Start Modal Edit -->
    <div class="modal fade" id="editnote">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title">Edit A Note</h5>
                    <button class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" class="" id="edit-note-form">
                        <div class="form-group">
                            <input type="text" name="etitle" class="form-control" placeholder="Note Title">
                        </div>
                        <div class="form-group">
                            <textarea name="enote" cols="30" rows="10" class='form-control' placeholder="Note ..."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary"><i class="fas fa-edit"></i>&nbsp;Edit</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- End Modal Edit -->
</div>

<?php 
    $page->footer(['layout/js/home.js']);
    ob_end_flush();
?>