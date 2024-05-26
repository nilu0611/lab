<?php
// Function to transform a string to all uppercase letters
function toUpperCase($string) {
    return strtoupper($string);
}

// Function to transform a string to all lowercase letters
function toLowerCase($string) {
    return strtolower($string);
}

// Function to make a string's first character uppercase
function ucfirstString($string) {
    return ucfirst($string);
}

// Function to make the first character of all words uppercase
function ucwordsString($string) {
    return ucwords($string);
}

// Sample strings
$sampleString1 = "hello world!";
$sampleString2 = "HELLO WORLD!";
$sampleString3 = "hello world!";
$sampleString4 = "hello world! this is a test.";

// Test the functions
echo "Original String 1: $sampleString1\n";
echo "Uppercase: " . toUpperCase($sampleString1) . "\n";
echo "Lowercase: " . toLowerCase($sampleString2) . "\n";
echo "First character uppercase: " . ucfirstString($sampleString3) . "\n";
echo "First character of all words uppercase: " . ucwordsString($sampleString4) . "\n";
?>
