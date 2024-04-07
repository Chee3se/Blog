<nav>
    <a class=<?php if ($_SERVER['REQUEST_URI'] == "/") {echo "active";} else {echo "none";}?> href="/">Posts</a>
    <a class=<?php if ($_SERVER['REQUEST_URI'] == "/about") {echo "active";} else {echo "none";}?> href="/about">About Us</a>
    <a class=<?php if ($_SERVER['REQUEST_URI'] == "/story") {echo "active";} else {echo "none";}?> href="/story">Story</a>
    <a class=<?php if ($_SERVER['REQUEST_URI'] == "/create") {echo "active";} else {echo "none";}?> href="/create">Create post</a>
</nav>
<main>
