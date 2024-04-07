CREATE DATABASE blog_petersons;
USE blog_petersons;

CREATE TABLE posts (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   title VARCHAR(255) NOT NULL
);

INSERT INTO posts(title)
VALUES
    ('My First Blog Post'),
    ('My Second Blog Post');

CREATE TABLE categories (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);

INSERT INTO categories (name, description)
VALUES
    ("sport",""),
    ("music",""),
    ("food","");

ALTER TABLE posts
    ADD category_id INT NOT NULL;

UPDATE posts
SET category_id = 1
WHERE id = 1;

UPDATE posts
SET category_id = 3
WHERE id = 2;

ALTER TABLE posts
    ADD FOREIGN KEY (category_id) REFERENCES categories(id);

INSERT INTO posts (title, category_id)
VALUES
    ("Blog 3", 2)