<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the XML input from the POST request
    $xmlInput = $_POST['xml_input'];

    // Create a new DOMDocument instance
    $dom = new DOMDocument();

    // Enable error handling
    libxml_use_internal_errors(true);

    // Load the XML input
    try {
        // This will enable XXE vulnerability
        $dom->loadXML($xmlInput);

        // Display success message if XML is valid
	

    } catch (Exception $e) {
        // Display error message if XML is not valid
        echo "<h2 style='color: red;'>Error: " . htmlspecialchars($e->getMessage()) . "</h2>";
    }


    libxml_clear_errors();
} else {
    echo "<h2 style='color: red;'>Please submit a valid XML document.</h2>";
}
?>

