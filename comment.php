<?php

require_once __DIR__ . '/user.php';

class Comment
{
    private $user;
    private $text;

    public function __construct(User $user, string $text)
    {
        $this->user = $user;
        $this->text = $text;
    }

    public function getUser()
    {
        return $this->user;
    }
    public function getText()
    {
        return $this->text;
    }
}
