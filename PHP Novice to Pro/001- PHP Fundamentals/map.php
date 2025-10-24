<?php // phpcs:ignoreFile

$users = [
    ['id' => 1, 'name' => 'john doe', 'email' => 'JOHN@EXAMPLE.COM'],
    ['id' => 2, 'name' => 'jane smith', 'email' => 'JANE@EXAMPLE.COM'],
    ['id' => 3, 'name' => 'bob johnson', 'email' => 'BOB@EXAMPLE.COM']
];

$normalizedUser = array_map(function($user){
    return [
        'id' => (int)$user['id'],
        'name'=> ucwords($user['name']),
        'email' => strtolower($user['email']),
        'avatar' => '/avatar/' . $user['id'] . '.jpg'
    ];
}, $users);

echo "<pre>";
echo "Previous";
print_r($users);

echo "Customized";

print_r($normalizedUser);