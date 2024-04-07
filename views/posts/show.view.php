<?php component('header', compact('page_title')); ?>

<?php component('navbar'); ?>

<h1><?= $post['title'] ?></h1>

<form method="GET" action="/edit">
    <input type="hidden" name="id" value="<?= $post['id'] ?>"/>
    <button>Edit</button>
</form>

<?php component('footer'); ?>
