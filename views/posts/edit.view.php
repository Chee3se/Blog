<?php component('header', compact('page_title')); ?>

<?php component('navbar'); ?>

<h1>Edit a post</h1>

<form class="post-form" method="POST" action="/">
    <input type="hidden" name="_method" value="PATCH"/>
    <input type="hidden" name="id" value="<?= $post['id'] ?>"/>
    <label>
        <span>Title:</span>
        <input name="title" value="<?= $title ?? $post['title'] ?>"/>
    </label>
    <?php if (isset($errors["title"])): ?>
        <p><?= $errors["title"] ?></p>
    <?php endif; ?>
    <br>
    <label>
        <span>Category:</span>
        <select name="category_id">
            <option value="1" <?= ($category ?? $post['category_id']) == 1 ? 'selected' : ''?>>sport</option>
            <option value="2" <?= ($category ?? $post['category_id']) == 2 ? 'selected' : ''?>>music</option>
            <option value="3" <?= ($category ?? $post['category_id']) == 3 ? 'selected' : ''?>>food</option>
        </select>
    </label>
    <?php if (isset($errors["category_id"])): ?>
        <p><?= $errors["category_id"] ?></p>
    <?php endif; ?>
    <br>
    <button>Submit</button>
</form>

<?php component('footer'); ?>
