<?php
require 'header.php';

if (isset($_SESSION['userId'])) {
    $user = selectOne(
        //username
        //rank user/admin/superadmin
        "SELECT id, username, rank FROM users WHERE id = :id",
        [":id" => $_SESSION['userId']]
    );
} else {
    header("Location: login.php");
}
$instructions = select("SELECT id, title, description FROM instructions WHERE creator = :id", [":id" => $_SESSION['userId']]);
?>

<head>
    <link rel="stylesheet" href="css/login.css">
</head>
<main>
    <div class="banner">
        <div class="container">
            <div class="bannertext">
                <h1>All uw instructies</h1>
            </div>
        </div>
    </div>
    <div class="login">
        <div class="container">
          <div id="list">
            <div id="card-content">
                <div class="flex list_top" >
                    <h3>Titel</h3>
                    <h3>Beschrijving</h3>
                </div>
                <div class="list_content">
                    <?php
                    foreach($instructions as $instruction){
                        $instructionTitle = $instruction['title'];
                        $instructionDesc = $instruction['description'];
                        ?>
                        <a class="list_item flex" href='instructions.php?id=<?=$instruction['id']?>'>
                        <div class="listTitles">
                            <h4><?= $instructionTitle ?></h4>
                        </div>

                        <div class="listDesc">
                            <p><?= $instructionDesc ?></p>
                        </div>
                        </a>

                    <?php    }
                    ?>
                </div>
            </div>
        </div>
        </div>
    </div>
</main>
<?php
require __DIR__ . '\footer.php';
?>