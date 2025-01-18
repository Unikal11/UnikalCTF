<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];

        $allowedTypes = ['image/jpeg', 'image/jpg'];

        if (in_array($fileType, $allowedTypes)) {
            $uploadFileDir = './uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                echo 'Sekili servere yuklendi dostunuza /uploads directory-den linki ata bilersiniz';
            } else {
                echo 'Sekil yuklenmedi herhansisa problem var';
            }
        } else {
		#echo '</div>';
		echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: red; flex-direction: column; text-align: center;">';

    echo '<img src="https://raw.githubusercontent.com/Unikal11/picture/refs/heads/master/WhatsApp%20Image%202024-10-21%20at%2000.44.17.jpeg" alt="Not Allowed" style="width:500px;height:auto; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);">';

    echo '<p style="color:white; font-size:40px; font-weight:bold; margin-top:20px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);">
            Təyyan-ın SOC monitorun-da tutuldun !!!
          </p>';

	            echo '</div>';
        }
    } else {
        echo 'No file uploaded or there was an error during upload.';
    }
}
?>

