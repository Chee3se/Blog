<?php

namespace controllers;

use Core\Database;

use Core\Validator;

class PostController
{
    public function index($id, $category)
    {
        $db = new Database(require base_path('config.php'));

        $query = 'SELECT * FROM posts';

        $params = [];

        // Category
        if ($category != null) {
            $query .= " LEFT JOIN categories ON posts.category_id = categories.id WHERE categories.name = :category";
            $params[":category"] = $_GET["category"];
        }

        // ID
        if ($id != null) {
            $query .= " WHERE posts.id = :id";
            $params[":id"] = $_GET["id"];
        }

        $posts = $db->query($query, $params)->fetchAll();

        view('posts/index', [
            'page_title' => 'Posts',
            'posts' => $posts
        ]);
    }

    public function create()
    {
        view('posts/create', [
            'page_title' => 'Create Post'
        ]);
    }

    public function store()
    {
        $db = new Database(require base_path('config.php'));

        $errors = [];

        $title = trim($_POST['title']);

        $category_id = $_POST['category_id'];

        $count = $db->query('SELECT COUNT(*) FROM categories', [])->fetch()['COUNT(*)'];

        if (!Validator::string($title, max: 255)) {
            $errors['title'] = 'Title must be between 1 and 255 characters';
        }

        if (!Validator::number($category_id, max: $count)) {
            $errors['category_id'] = 'Category must be between 1 and '.$count;
        }

        if (empty($errors)) {
            $db->insert('posts', compact('title', 'category_id'));

            header('Location: /');

            die();
        }

        view('posts/create', [
            'page_title' => 'Create Post',
            'errors' => $errors,
            'title' => $title,
            'category' => $category_id
        ]);
    }

    public function show($id)
    {
        $db = new Database(require base_path('config.php'));

        $post = $db->query('SELECT * FROM posts WHERE id = ?', [$id])->fetch();

        view('posts/show', [
            'page_title' => $post['title'],
            'post' => $post
        ]);
    }

    public function edit($id)
    {
        $db = new Database(require base_path('config.php'));

        $post = $db->query('SELECT * FROM posts WHERE id = ?', [$id])->fetch();

        view('posts/edit', [
            'page_title' => 'Edit Post',
            'post' => $post
        ]);
    }

    public function update($id)
    {
        $db = new Database(require base_path('config.php'));

        $errors = [];

        $title = trim($_POST['title']);

        $category_id = $_POST['category_id'];

        $count = $db->query('SELECT COUNT(*) FROM categories', [])->fetch()['COUNT(*)'];

        if (!Validator::string($title, max: 255)) {
            $errors['title'] = 'Title must be between 1 and 255 characters';
        }

        if (!Validator::number($category_id, max: $count)) {
            $errors['category_id'] = 'Category must be between 1 and '.$count;
        }

        if (empty($errors)) {
            $db->update('posts', $id, compact('title', 'category_id'));

            header('Location: /');

            die();
        }

        view('posts/edit', [
            'page_title' => 'Edit Post',
            'errors' => $errors,
            'title' => $title,
            'category' => $category_id
        ]);
    }

    public function destroy($id)
    {
        $db = new Database(require base_path('config.php'));

        $db->delete('posts', $id);

        header('Location: /');
    }
}