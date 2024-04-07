<?php component('header', compact('page_title')); ?>


<?php component('navbar') ?>


<form class="search-form">
    <input name='id' placeholder='ID' value='<?= $_GET["id"] ?? ''?>'/>
    <input name='category' placeholder='Category' value='<?= $_GET["category"] ?? ''?>'/>
    <button>Filter</button>
</form>

<h1>Posts</h1>
<ol>
    <?php foreach ($posts as $post) { ?>
        <li>
            <a class="post" href="/show?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a>
            <form class="delete-form" method="POST" action="/">
                <input type="hidden" name="_method" value="DELETE"/>
                <input type="hidden" name="id" value="<?= $post["id"] ?>"/>
                <button>❌</button>
            </form>
        </li>
    <?php } ?>
</ol>

<?php component('footer') ?>