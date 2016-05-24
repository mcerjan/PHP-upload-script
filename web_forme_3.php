<?php

echo '
<form action="" method="POST">';

if (!isset($_POST['gumb_broj'])) {
    echo 'Koliko datoteka zelite uploadati na Vas server?<br/>';
    echo '<input type="text" name="broj" value=""/>';
    echo '<input type="submit" name="gumb_broj" value="Send"/>';
} else {
    $broj = $_POST["broj"];

    for ($i = 1; $i <= $broj; $i++) {
        if ($_POST["broj"] <= 5) {

            echo '<input type="file" name="datoteka" value=""/><br/>';
            echo'<br/>';
        } else {
            echo 'Preveliki broj datoteka.';
        }
        echo'<input type="submit" name="gumb" value="Upload"/><br/><br/>';
    }
    echo'</form>';
}
if (isset($_FILES["datoteka"])) {
    $dir_za_upload = 'datoteke/';

    $ime_datoteke = $_FILES['datoteka']['name'];

    $filename_array = explode('.', $ime_datoteke);
    $file_ext = end($filename_array);

    $new_filename = md5('file_' . time() . rand()) . '.file';

    $new_file_path = $dir_za_upload . $new_filename;

    if (move_uploaded_file($_FILES['datoteka']['tmp_name'], $new_filepath)) {
        echo 'Datoteka ' . $ime_datoteke . ' je uspjesno prenesena na server.';
    }
}