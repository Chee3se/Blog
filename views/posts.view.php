<!-- Head -->
<?php require "components/head.php" ?>

    <!-- Navbar -->
    <?php require "components/navbar.php" ?>

    <!-- Form Filter -->
    <form>
        <input name='id' placeholder='ID' value='<?= $_GET["id"] ?? ''?>'/>
        <input name='category' placeholder='Category' value='<?= $_GET["category"] ?? ''?>'/>
        <button>Filter</button>
    </form>

    <!-- Post List -->
    <h1>Posts</h1>
    <ol>
        <?php foreach ($posts as $post) { ?>
            <h2><li> <?= $post["title"] ?> </li></h2>
        <?php } ?>
    </ol>
    
    <!-- Dump and Die -->
    <?php dd($posts) ?>

<!-- Footer -->
<?php require "components/footer.php" ?>