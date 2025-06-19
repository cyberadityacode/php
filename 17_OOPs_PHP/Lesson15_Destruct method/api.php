<?php

class RequestCounter {
    private $file;
    private $count;

    public function __construct($file = 'request_count.txt') {
        $this->file = $file;

        // Ensure file exists with initial value if not
        if (!file_exists($this->file)) {
            file_put_contents($this->file, '0');
        }

        // Lock the file for read/write to avoid race conditions
        $handle = fopen($this->file, 'c+');
        if (flock($handle, LOCK_EX)) {
            $content = fread($handle, filesize($this->file));
            $this->count = (int)trim($content);

            // Increment the count
            $this->count++;

            // Rewind and overwrite
            ftruncate($handle, 0);
            rewind($handle);
            fwrite($handle, $this->count);

            // Unlock and close
            fflush($handle);
            flock($handle, LOCK_UN);
            fclose($handle);
        } else {
            error_log("Could not lock the file.");
            $this->count = -1; // Indicate error
        }
    }

    public function getCount(): int {
        return $this->count;
    }
}

// Only count on GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $counter = new RequestCounter();

    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'success',
        'message' => 'GET request received.',
        'request_count' => $counter->getCount()
    ]);
} else {
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'message' => 'Only GET requests are allowed.'
    ]);
}
