<?php
/* 
# Challenge 3 - Build a Leaderboard

Array of players with name and score.

Sort descending by score using usort.

Return top 3 players.
*/

function getTopPlayers(array $players, int $top = 3)
{
    // sort descending score
    usort($players, function ($a, $b) {
        return $b['score'] <=> $a['score'];
    });

    return array_slice($players, 0, $top);
}

$players = [
    [
        'name' => 'aditya',
        'score' => 1077
    ],
    [
        'name' => 'cyberaditya',
        'score' => 1063
    ],
    [
        'name' => 'dubey',
        'score' => 1008
    ],
    [
        'name' => 'abc',
        'score' => 1001
    ]
];

// executing task

// top 3 players
$topPlayers = getTopPlayers($players);

// display results

echo "TOP 3 Players :<br>";
foreach ($topPlayers as $rank => $player) {
    echo ($rank + 1) . " {$player['name']} ({$player['score']}) pts <br> ";
}
