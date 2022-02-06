<?php
include 'init.php';

if (!logged_in()){
    header('Location: index.php');
    exit();
}

include 'template/header.php';
?>

<h3>Create Album</h3>

<?php
$ports = get_ports();


if (isset($_FILES['image'], $_POST['album_name'], $_POST['album_description'], $_POST['port_id'])){
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_temp = $_FILES['image']['tmp_name'];

    $album_name = $_POST['album_name'];
    $album_description = $_POST['album_description'];  
    $album_category = $_POST['port_id']; 

    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
    $image_ext = strtolower(end(explode('.', $image_name)));
    

    $errors = array();
    
    if (empty($image_name) || empty($album_name) || empty($album_description)){
        $errors[] = 'Something is missing';
    } else {

        if (strlen($album_name) > 55 || strlen($album_description) > 255){
            $errors[] = 'One or more fields contains too many characters.';
        }

        if (in_array($image_ext, $allowed_ext) === false){
            $errors[] = 'File type not allowed';
        }

        if ($image_size > 2097152) {
            $errors[] = 'Maximum file size is 2mb';
        }

        if (!empty($errors)) {
            foreach($errors as $error) {
                echo $error, '<br/>';
            }
        }else{
            create_album($album_name, $album_description, $album_category, $image_temp, $image_ext);
            header('Location: albums.php');
            exit();
        }

    }
}



// if (isset($_POST['album_name'], $_POST['album_description'], $_POST['port_id'])){
//     $album_name = $_POST['album_name'];
//     $album_description = $_POST['album_description'];  
//     $album_category = $_POST['port_id']; 

//     $errors = array();

//     if(empty($album_name) || empty($album_description)) {
//         $erros[] = 'Album name and description required!';
//     }else{
//         if (strlen($album_name) > 55 || strlen($album_description) > 255){
//             $errors[] = 'One or more fields contains too many characters.';
//         }
//     }

//     if (!empty($errors)) {
//         foreach($errors as $error) {
//             echo $error, '<br/>';
//         }
//     }else{
//         create_album($album_name, $album_description, $album_category);
//         header('Location: albums.php');
//         exit();
//     }
// }

?>

<form action="" method="post" enctype="multipart/form-data">
        <p>Choose a file: </br><input type="file" name="image" /></p>
        <p>Name: </br><input type="text" name="album_name"  maxlength="55" /></p>
        <p>Description: </br><textarea name="album_description" rows="6" cols="35" maxlenght="255"></textarea></p>
        <select name="port_id">
            <?php
            foreach($ports as $port) {
                echo '<option value="', $port['id'] ,'">', $port['name'] ,'</option>';
            }
            ?>
</select>
        <p><input type="submit" value="Create" /></p>
    </form>

<?php
include 'template/footer.php';
?>