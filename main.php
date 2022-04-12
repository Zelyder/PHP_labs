<?php

require_once __DIR__ . '/user.php';
require_once __DIR__ . '/comment.php';

$user1 = new User(0, "Adam", "TestAdam@mail.ru", "12345678");
$user2 = new User(1, "Alex", "TestAlex@mail.ru", "12345678");

$currentDate = new DateTime();

$user3 = new User(2, "Emilia", "Test@mail.ru", "12345678");
$user4 = new User(3, "John", "Test@mail.ru", "12345678");

$comments = [
    new Comment($user1, "Comment from User 1"),
    new Comment($user2, "Comment from User 2"),
    new Comment($user3, "Comment from User 3"),
    new Comment($user4, "Comment from User 4"),
];

foreach ($comments as $comment) {
    if ($comment->getUser()->getCreationDate() > $currentDate) {
        echo $comment->getText(), "<br>";
    }
}
