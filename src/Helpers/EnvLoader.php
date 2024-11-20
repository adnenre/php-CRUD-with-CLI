<?php

namespace App\Helpers;

class EnvLoader {
    public static function load(string $path = __DIR__ . '/../../.env'): void {
        if (!file_exists($path)) {
            throw new \Exception("Environment file not found: $path");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue; // Skip comments
            [$key, $value] = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}
