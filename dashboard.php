<?php
require("header.php");

if (!isset($_SESSION['userId'])) {
    header("Location: login.php?msg= Log eerst in!");
}
$id = $_SESSION['userId'];

$user = selectOne("SELECT * FROM users WHERE id = :id",
    [':id' => $id]);

?>
<main>
    <div class="banner">
        <div class="container">
            <div class="bannertext">
                <h1>Hi <?php echo($user['username']) ?></h1>
                <h2>Welkom op het dashboard!</h2>
            </div>
        </div>
    </div>

    <div class="maincontent">
        <div class="container">
            <h4 class="sub_title">Wat kan je hier doen?</h4>
            <div class="articles">

                <a href="list.php">
                    <div class="article">
                        <img src="backend/img/qr3.gif" alt="qr-code">
                        <h4>Qr informatie pagina</h4>
                        <p>
                            Hier leggen we de werking uit van met maken van een nieuwe qr code, en leggen we uit hoe met
                            maken van de pagina in elkaar zit.
                        </p>
                    </div>
                </a>

                <a href="create.php">
                    <div class="article">
                        <img src="backend/img/qr2.gif" alt="qr-code">
                        <h4>Qr pagina maken</h4>
                        <p>
                            Hier kan je dan ook daadwerkelijk een nieuwe qr pagina aanmaken als je de informatie hebt
                            gelezen. Of als je die niet nodig hebt.
                        </p>

                    </div>
                </a>
                <?php if ($user['rank'] === 'superadmin') {?>
                <?= " <a href='users_admin/edit.php?id=${user['id']}'>" ?>
                <div class="article">
                    <img src="backend/img/qr5.png" alt="People buying stuff">
                    <h4>Admin Pagina</h4>
                    <p>
                        Deze pagina kan je alleen gebruiken als je een van de hogere admins bent. Hier kan je andere
                        accounts beheren en andere account hogere admins maken. Ook kun je de Qr pagina's hier
                        beheren
                    </p>
                </div>
                </a>
                <?php } else {}?>

                <?= " <a href='u_account/my_account.php?id=${user['id']}'>" ?>
                <div class="article">
                    <img src="backend/img/qr4.jpg" alt="Person at front desk">
                    <h4>Mijn Account</h4>
                    <p>
                        Hier kan je jou accountgegevens zien en aanpassen wanneer gewenst.
                    </p>
                </div>
                </a>
            </div>
        </div>
    </div>
</main>
<footer>
    <?php
    require('footer.php');
    ?>
</footer>
</body>
</html>