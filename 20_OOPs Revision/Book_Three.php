<?php

class Book_Three
{
    public $title;
    public $author;

    public function setDetails($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    public function getDetails()
    {
        echo "{$this->title} by {$this->author}";
    }
}

$book = new Book_Three();
$book->setDetails("Aditya Dubey", "Accelerating e-Governance");
$book->getDetails();
