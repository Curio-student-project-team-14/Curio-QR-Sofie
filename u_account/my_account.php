<?php
require("../users_admin/header.php");

if (!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) {//should make this userid
    header('Location: ../../dashboard.php');
    exit();
}

$id = $_GET['id'];
$user = selectOne("SELECT * FROM users WHERE id = :id", [
    ':id' => $id,
]);

$creator = $_GET['id'];
$qrs = select("SELECT * FROM instructions WHERE creator = :creator", [
    ':creator' => $creator
]);
?>
    <main>
        <div class="twobanner">
            <h1 class="size">Mijn Account:</h1>
        </div>
        <div class="pink">
            <div class="twocontainer size">
                <div class="card">
                    <?= $user['username'] ?>
                    <div>
                        <label class="align" for="user">Gebruikersnaam:</label>
                        <?= $user['username'] ?>
                    </div>
                    <div>
                        <label class="align" for="email">Email:</label>
                        <?= $user['email'] ?>
                    </div>
                    <div>
                        <label class="align" for="rank">Admin Status:</label>
                        <?= $user['rank'] ?>
                    </div>
                    <div>
                        <label for="qr">Mijn QR Code's:</label>
                        <table>

                            <tr>
                                <th>Titel:</th>
                                <?php foreach ($qrs as $qr) {
                                    echo "<td>${qr['title']}<td>";
                                } ?>
                            </tr>
                            <tr>
                                <th>Omschrijving:</th>
                                <?php foreach ($qrs as $qr) {
                                    echo "<td>${qr['description']}<td>";
                                } ?>
                            </tr>
                            <tr>
                                <th>Gemaakt op:</th>
                                <?php foreach ($qrs as $qr) {
                                    echo "<td>${qr['created_time']}<td>";
                                } ?>
                            </tr>
                            </tr>
                        </table>
                    </div>
                    <div class="toedit-button">
                        <?= "<a href='edit.php?id=${user['id']}'>Account Wijzigen</a>" ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
require("../footer.php")
?>