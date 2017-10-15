<?php
   header('Access-Control-Allow-Origin: *');

   // Define database connection parameters
   $hn      = 'localhost';
   $un      = 'id3038679_mayudb';
   $pwd     = '12345';
   $db      = 'id3038679_project';
   $cs      = 'utf8';

   // Set up the PDO parameters
   $dsn  = "mysql:host=" . $hn . ";dbname=" . $db . ";charset=" . $cs;
   $opt  = array(
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                        PDO::ATTR_EMULATE_PREPARES   => false,
                       );
   // Create a PDO instance (connect to the database)
   $pdo  = new PDO($dsn, $un, $pwd, $opt);

   // Retrieve specific parameter from supplied URL
   $key  = strip_tags($_REQUEST['key']);
   $data    = array();


   // Determine which mode is being requested
   switch($key)
   {
   
      // Add a new record to the technologies table
      case "create":

         // Sanitise URL supplied values
         $DonarName= filter_var($_REQUEST['DonarName'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $Mobile_No= filter_var($_REQUEST['Mobile_No'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $Mobile_No2= filter_var($_REQUEST['Mobile_No2'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $Villege= filter_var($_REQUEST['Villege'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $City= filter_var($_REQUEST['City'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $BloodGroup= filter_var($_REQUEST['BloodGroup'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);

         // Attempt to run PDO prepared statement
         try {
            $sql  = "INSERT INTO technologies(DonarName, Mobile_No, Mobile_No2, Villege, City, BloodGroup) VALUES(:DonarName, :Mobile_No, :Mobile_No2, :Villege, :City, :BloodGroup)";
            $stmt    = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->execute();

            echo json_encode(array('message' => 'Congratulations the record ' . $name . ' was added to the database'));
         }
         // Catch any errors in running the prepared statement
         catch(PDOException $e)
         {
            echo $e->getMessage();
         }

      break;



      // Update an existing record in the technologies table
      case "update":

         // Sanitise URL supplied values
         $name          = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $description   = filter_var($_REQUEST['description'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
         $recordID      = filter_var($_REQUEST['recordID'], FILTER_SANITIZE_NUMBER_INT);

         // Attempt to run PDO prepared statement
         try {
            $sql  = "UPDATE technologies SET name = :name, description = :description WHERE id = :recordID";
            $stmt =  $pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':recordID', $recordID, PDO::PARAM_INT);
            $stmt->execute();

            echo json_encode('Congratulations the record ' . $name . ' was updated');
         }
         // Catch any errors in running the prepared statement
         catch(PDOException $e)
         {
            echo $e->getMessage();
         }

      break;



      // Remove an existing record in the technologies table
      case "delete":

         // Sanitise supplied record ID for matching to table record
         $recordID   =  filter_var($_REQUEST['recordID'], FILTER_SANITIZE_NUMBER_INT);

         // Attempt to run PDO prepared statement
         try {
            $pdo  = new PDO($dsn, $un, $pwd);
            $sql  = "DELETE FROM technologies WHERE id = :recordID";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':recordID', $recordID, PDO::PARAM_INT);
            $stmt->execute();

            echo json_encode('Congratulations the record ' . $name . ' was removed');
         }
         // Catch any errors in running the prepared statement
         catch(PDOException $e)
         {
            echo $e->getMessage();
         }

      break;
   }

?>