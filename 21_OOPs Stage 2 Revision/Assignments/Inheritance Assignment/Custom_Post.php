<!-- 
Inheritance: Create a Custom_Post parent class and Blog_Post child class 
that adds a get_excerpt() method.
-->
<?php

// Parent Class

class Custom_Post
{
    protected string $title;
    protected string $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }
}

// Child Class

class Blog_Post extends Custom_Post
{
    // Adds new functionality

    public function get_excerpt(int $length=50)
    {
        // Strip HTML tag and trim content
        $excerpt = strip_tags($this->content);
        if(strlen($excerpt) > $length) {
            return substr($excerpt, 0, $length) . "...";
        }
        return $excerpt;
    }
}

// Usage

$blogPost = new Blog_Post(
    "Understanding Inheritance in PHP", "Inheritance allows a class (child) to use properties and methods of another class (parent). 
     It helps in code reusability and better structure. 
     Here, the Blog_Post class extends Custom_Post and adds get_excerpt()."
);


echo "Title: " . $blogPost->getTitle() . PHP_EOL;

echo "Excerpt: " . $blogPost->get_excerpt(50). PHP_EOL;
