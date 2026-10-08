<?php
//phpinfo();

require_once("includes/page/header.php");

print_r($connection->getPdo());

if (isset($_POST["username"], $_POST["fullName"], $_POST["password"])){
    $reg_statment = $connection->getPdo()->prepare("INSERT INTO user (user, full_name, password, user_token) VALUES (?, ?, ?, ?)");
    $reg_statment->execute([
        $_POST["username"], 
        $_POST["fullName"], 
       sha1( $_POST["password"]),
       md5(mt_rand(), true)
    ]);
}
?>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Regisztráció</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php
                 echo $_SERVER["PHP_SELF"];
                 ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Felhasználónév</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Bajoslalcsi">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Teljes név</label>
                        <input type="text" class="form-control" id="userName" name="fullName" placeholder="Bajos Lalcsi">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Elfogadod a chat szabályzatot?</label>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Regisztráció</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once("includes/page/end.php");
?>