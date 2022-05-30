<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>

<?php
// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql ="SELECT * FROM lms  WHERE lms_id= '$id'";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../../Files/' . $file['file'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../../Files/' . $file['file']));
        readfile('../../Files/' . $file['file']);

        exit;
    }

}
?>