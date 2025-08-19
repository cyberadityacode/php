<!-- 
Interface: Create Exportable interface with method exportData() 
and implement in UserExporter (to CSV) and PostExporter (to JSON). 
-->
<?php

interface Exporter
{
    public function exportData();
}

/**
 * UserExporter: Export data to CSV
 */
class UserExporter implements Exporter
{
    private $users;
    public function __construct(array $users)
    {
        $this->users = $users;
    }
    public function exportData()
    {
        $csv = "id,name, email \n"; //CSV Header
        foreach($this->users as $user){
            $csv .= "{$user['id']}, {$user['name']}, {$user['email']} \n";
        }
        return $csv;
    }
}


// PostExporter: Exports data to JSON
class PostExporter implements Exportable
{
    private $posts;

    public function __construct(array $posts)
    {
        $this->posts = $posts;
    }

    public function exportData()
    {
        return json_encode($this->posts, JSON_PRETTY_PRINT);
    }
}

// Example usage
$users = [
    ["id" => 1, "name" => "Alice", "email" => "alice@example.com"],
    ["id" => 2, "name" => "Bob", "email" => "bob@example.com"],
];

$posts = [
    ["id" => 101, "title" => "First Post", "content" => "Hello World!"],
    ["id" => 102, "title" => "Second Post", "content" => "Learning PHP Interfaces"],
];

// Export Users to CSV
$userExporter = new UserExporter($users);
echo "User CSV Export:\n";
echo $userExporter->exportData();
echo "\n";

// Export Posts to JSON
$postExporter = new PostExporter($posts);
echo "Post JSON Export:\n";
echo $postExporter->exportData();

?>
