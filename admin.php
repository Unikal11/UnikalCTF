<?php
$authorized_username = 'admin';

// Check if the username is provided
if (isset($_GET['username']) && $_GET['username'] === $authorized_username) {
    
    class Evil {
        public $cmd = 'ls';
        function __destruct() {
            system($this->cmd); // Executes the command
        }
    }

    // Check if 'data' is provided in the GET request
    if (isset($_GET['data'])) {
        $data = $_GET['data'];
        $object = unserialize($data);  // Insecure deserialization
        echo "Xosh geldin Admin" . print_r($object, true);
    } else {
        echo "No data provided.";
    }

} else {
    echo "sənin bu səhfəyə access-ə icazən yoxdur. ";
}
?>

