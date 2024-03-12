<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Posts</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="./elephant.png">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <a href="/index.php">Posts</a>
        <a href="/about.php">About Us</a>
        <a href="/story.php">Story</a>
    </nav>

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

</body>
</html>