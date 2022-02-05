<?php
    function album_data($album_id) {

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
  $album_id = (int)$album_id;

  $args = func_get_args();
  unset($args[0]);
  $fields = '`'.implode('`, `', $args).'`';
  
  $sql = "SELECT $fields FROM `db_album` WHERE `album_id`=$album_id AND `user_id`=".$_SESSION['id'];
  $query = mysqli_query($conn, $sql);

  $query_result = mysqli_fetch_assoc($query);
  foreach ($args as $field) {
    $args[$field] = $query_result[$field];
  }
 
  return $args;
  
  mysqli_close($conn);
    }

    function album_check($album_id) {
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
      
      $album_id = (int)$album_id;
               // Check user is exist in the database
       $query    = "SELECT * FROM `db_album` WHERE `album_id`='$album_id' AND `user_id`=".$_SESSION['id'] ;
      $result = mysqli_query($conn, $query) or die(mysqli_error());
      
      if (mysqli_num_rows($result) == 1) {
      
        return true;
      
      } else {
        
        return false;
      
      }
      
      mysqli_close($conn);
      
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

        mysqli_close($conn);
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

     

      $album_id = (int)$album_id;
      $album_name = mysqli_real_escape_string($conn, htmlentities($album_name));
      $album_description = mysqli_real_escape_string($conn, htmlentities($album_description));
      
      $sql = "UPDATE `db_album` SET `name`='$album_name', `description`='$album_description' WHERE `album_id`=$album_id AND `user_id`=".$_SESSION['id'];
      $result = mysqli_query($conn, $sql);

      mysqli_close($conn);

    }

    function delete_album($album_id) {
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

      $album_id = (int)$album_id;        

      //To do: Use a method to delete all files from album and thumbs folder, then the directory.
      
      $sql = "DELETE FROM `db_album` WHERE `album_id`=$album_id AND `user_id`=".$_SESSION['id'];
      $sql2 = "DELETE FROM `db_images` WHERE `album_id`=$album_id AND `user_id`=".$_SESSION['id'];
      
      $result = mysqli_query($conn, $sql);
      $result2 = mysqli_query($conn, $sql2);

      mysqli_close($conn);
    
    }
?>