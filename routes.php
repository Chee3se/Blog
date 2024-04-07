<?php

use controllers\AboutController;
use controllers\PostController;
use controllers\StoryController;

// Posts
$router->get('/{id}/{category}', [PostController::class, 'index']);
// $router->get('/{id?}/{category?}', [PostController::class, 'index']);

// CRUD

// Create
$router->get('/create', [PostController::class, 'create']);
$router->post('/', [PostController::class, 'store']);

// Read
$router->get('/show/{id}', [PostController::class, 'show']);

// Update
$router->get('/edit/{id}', [PostController::class, 'edit']);
$router->patch('/{id}', [PostController::class, 'update']);

// Delete
$router->delete('/{id}', [PostController::class, 'destroy']);

// Story
$router->get('/story', [StoryController::class, 'index']);

// About
$router->get('/about', [AboutController::class, 'index']);