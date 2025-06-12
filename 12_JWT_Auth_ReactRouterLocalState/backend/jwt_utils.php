<?php
// jwt_utils.php

$SECRET_KEY = "jaimatadi"; // You can store this in .env file

function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function generate_jwt($payload, $secret) {
    $header = ['alg' => 'HS256', 'typ' => 'JWT'];
    $segments = [];
    $segments[] = base64url_encode(json_encode($header));
    $segments[] = base64url_encode(json_encode($payload));
    $signature = hash_hmac('sha256', implode('.', $segments), $secret, true);
    $segments[] = base64url_encode($signature);
    return implode('.', $segments);
}

function verify_jwt($token, $secret) {
    $parts = explode('.', $token);
    if (count($parts) !== 3) return false;

    [$header, $payload, $signature] = $parts;
    $valid_signature = base64url_encode(hash_hmac('sha256', "$header.$payload", $secret, true));

    if (!hash_equals($signature, $valid_signature)) return false;

    $data = json_decode(base64_decode($payload), true);
    if (isset($data['exp']) && time() > $data['exp']) return false;

    return $data;
}
