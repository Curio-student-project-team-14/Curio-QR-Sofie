<?php
require('header.php');


if (!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) { //should make this userid
    header('Location: ../index.php');
    exit();
}

$id = $_GET['id'];
$user = selectOne("SELECT * FROM users WHERE id = :id", [
    ':id' => $id
]);

if ($user['rank'] == "user") {
    header("location: ../dashboard.php");
    exit();
}

if ($_SESSION['userId'] === $user['id']) {

    if ($user['rank'] == "admin" || $user['rank'] == "superadmin") {
        $users = select("SELECT * FROM users");
        ?>
        <main>
            <div class="twobanner">
                <h1 class="size">Admin Pagina</h1>
            </div>
            <div class="pink">
                <div class="twocontainer small-size">
                    <div class="card">
                        <h4>Geregistreerde gebruikers:</h4>
                        <ul>
                            <?php foreach ($users as $user) {
                                echo "<li><a href='detail.php?id=${user['id']}'>${user['username']}</a></li>";
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <?php require('footer.php'); ?>
    <?php }
} else {
    header('Location: ../dashboard.php');
} ?>