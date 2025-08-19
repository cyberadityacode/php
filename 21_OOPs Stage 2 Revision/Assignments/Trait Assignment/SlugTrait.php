<?php

// Trait definition
trait SlugTrait
{
    public function generateSlug($string)
    {
        // Convert to lowercase
        $slug = strtolower($string);
        // Replace spaces and special characters with hyphens
        $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);
        // Trim hyphens from start and end
        $slug = trim($slug, '-');
        return $slug;
    }
}

// Page class using SlugTrait
class Page
{
    use SlugTrait;

    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getSlug()
    {
        return $this->generateSlug($this->title);
    }
}

// Category class using SlugTrait
class Category
{
    use SlugTrait;

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getSlug()
    {
        return $this->generateSlug($this->name);
    }
}

// Example usage
$page = new Page("Hello World: PHP Traits in Action!");
$category = new Category("Web Development & Programming");

echo "Page Slug: " . $page->getSlug() . "\n";
echo "Category Slug: " . $category->getSlug() . "\n";

?>
