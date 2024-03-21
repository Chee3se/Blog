<?php require 'components/head.php'?>
<?php require 'components/navbar.php'?>

<h1>Create post</h1>

<form method="POST">
    <label>
        <span>Title:</span>
        <input name="title"/>
    </label>
    <label>
        <span>Category:</span>
        <select name="category_id">
            <option value="1">sport</option>
            <option value="2">music</option>
            <option value="3">food</option>
        </select>
    </label>
    <button>Submit</button>
</form>

<?php require 'components/footer.php'?>