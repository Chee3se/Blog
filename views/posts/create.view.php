<?php component('header', compact('page_title')); ?>

<?php component('navbar') ?>

<h1>Create post</h1>

<form class="post-form" method="POST" action="/">
    <label>
        <span>Title:</span>
        <input name="title" value="<?= $title ?? "" ?>"/>
    </label>
    <?php if (isset($errors["title"])): ?>
        <p><?= $errors["title"] ?></p>
    <?php endif; ?>
    <br>
    <label>
        <span>Category:</span>
        <select name="category_id">
            <option value="1" <?= ($category ?? 1) == 1 ? 'selected' : ''?>>sport</option>
            <option value="2" <?= ($category ?? 1) == 2 ? 'selected' : ''?>>music</option>
            <option value="3" <?= ($category ?? 1) == 3 ? 'selected' : ''?>>food</option>
        </select>
    </label>
    <?php if (isset($errors["category_id"])): ?>
        <p><?= $errors["category_id"] ?></p>
    <?php endif; ?>
    <br>
    <button>Submit</button>
</form>

<?php component('footer') ?>