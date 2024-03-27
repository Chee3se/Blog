<?php require 'components/head.php'?>
<?php require 'components/navbar.php'?>

<h1>Create post</h1>

<form method="POST">
    <label>
        <span>Title:</span>
        <input name="title" value="<?= $_POST["title"] ?? "" ?>"/>
    </label>
    <?php if (isset($errors["title"])): ?>
        <p><?= $errors["title"] ?></p>
    <?php endif; ?>
    <label>
        <span>Category:</span>
        <select name="category_id">
            <option value="1">sport</option>
            <option value="2">music</option>
            <option value="3">food</option>
        </select>
    </label>
    <?php if (isset($errors["category_id"])): ?>
        <p><?= $errors["category_id"] ?></p>
    <?php endif; ?>
    <button>Submit</button>
</form>

<?php require 'components/footer.php'?>