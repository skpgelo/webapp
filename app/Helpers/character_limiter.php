<?php
if (!function_exists('character_limiter')) {
    function character_limiter(string $str, int $n = 500, string $end_char = '&#8230;'): string 
    {
        // Remove duplicate spaces and clean up line breaks
        $str = preg_replace('/\s+/', ' ', str_replace(["\r\n", "\r", "\n"], ' ', $str));

        // If the string is already short enough, return it as-is
        if (mb_strlen($str) <= $n) {
            return $str;
        }

        // Initialize output and split string into words
        $out = '';
        $words = explode(' ', trim($str));

        foreach ($words as $val) {
            $out .= $val . ' ';

            // Check if the current word crosses the threshold
            if (mb_strlen(trim($out)) >= $n) {
                return (mb_strlen($str) === mb_strlen(trim($out))) ? trim($out) : trim($out) . $end_char;
            }
        }

        return trim($str);
    }
}

// Example Usage:
$text = "Testing the custom string character helper function.";
echo character_limiter($text, 15); 
// Outputs: "Testing the custom…"
?>