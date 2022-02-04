<?php
    function album_data($album_id) {

    }

    function album_check($album_id) {

    }

    function get_albums() {
      $servername = "localhost";
      $username = "kketrades";
      $password = "Sifed32365042?";
      $dbname = "pitstop_upload";
      
      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

        $albums = array();

        $sql = "SELECT `db_album`.`album_id`, `db_album`.`timestamp`, `db_album`.`name`, LEFT(`db_album`.`description`, 50) as `description`, COUNT(`db_images`.`image_id`) as `image_count`
        FROM `db_album`
        LEFT JOIN `db_images`
        ON `db_album`.`album_id` = `db_images`.`album_id`
        WHERE `db_album`.`user_id` = ".$_SESSION['id']."
        GROUP BY `db_album`.`album_id`
        ";
        $result = mysqli_query($conn, $sql);

        while ($album_row = mysqli_fetch_assoc($result)){
          $albums[] = array(

            'id' => $album_row['album_id'],
            'timestamp' => $album_row['timestamp'],
            'name' => $album_row['name'],
            'description' => $album_row['description'],
            'count' => $album_row['image_count']

          );
        }

        return $albums;
      }

    function create_album($album_name, $album_description) {         

       $servername = "localhost";
       $username = "kketrades";
       $password = "Sifed32365042?";
       $dbname = "pitstop_upload";
       
       // Create connection
       $conn = mysqli_connect($servername, $username, $password, $dbname);
       // Check connection
       if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
       }

         $album_name = mysqli_real_escape_string($conn, htmlentities($album_name));
  $album_description = mysqli_real_escape_string($conn, htmlentities($album_description));
       
       $sql = "INSERT INTO db_album (user_id, timestamp, name, description)
       VALUES ('".$_SESSION['id']."', UNIX_TIMESTAMP(), '$album_name', '$album_description')";
       
       
       if (mysqli_query($conn, $sql)) {
        mkdir('uploads/'.mysqli_insert_id($conn), 0744);
        mkdir('uploads/thumbs/'.mysqli_insert_id($conn), 0744);
       } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }

       mysqli_close($conn);
    }

    function edit_album($album_id, $album_name, $album_description){

    }

    function delete_album($album_id) {
        
    }
?>