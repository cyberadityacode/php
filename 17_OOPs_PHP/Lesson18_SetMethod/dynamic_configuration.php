<?php
namespace conf;

class Config {
    private $settings = [];

    public function __set($key, $value) {
        $this->settings[$key] = $value;
    }

    public function __get($key) {
        return $this->settings[$key] ?? null;
    }
}
$config = new Config();
$config->timezone = 'Asia/Kolkata';
echo $config->timezone;  // Asia/Kolkata
?>