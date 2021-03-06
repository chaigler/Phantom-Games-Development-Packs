<?php
   //******************************************************************************
   //******************************************************************************
   //******************************************************************************
   // SQL CODE
   //******************************************************************************
   //******************************************************************************
   //******************************************************************************

   //sqlLogin()
   // - $username - String: SQL Username
   // - $password - String: SQL Password
   // - $database - String: The Database to connect to
   function sqlLogin($username, $password, $database) {
      $mysqli = new mysqli("localhost", "$username", "$password", "$database");

      /* check connection */
      if (mysqli_connect_errno()) {
         printf("Connect failed: %s\n", mysqli_connect_error());
         return -1;
      }

      return $mysqli;
   }

   //sqlCall()
   //$con - The SQL object
   //$sqlLine - String: What to do?
   function sqlCall($con, $sqlLine) {
      if($con->real_query($sqlLine)) {
         $result = $con->store_result();
         if(!$result) {
            if(strcmp($con->error, "") == 0) {
               return 1;
            }
            return -1;         
         }
         return $result;
      }
   }
   //* Phantom: to get rows: while($row = $result->fetch_array(MYSQLI_ASSOC))

   //sqlClear()
   //$p_Result - The SQL Result object
   function sqlClear($p_Result) {
      $p_Result->free();
      while($this->Mysqli->next_result()){
         if($l_result = $this->Mysqli->store_result()){
            $l_result->free();
         }
      }
   }

   //sqlDC()
   //$con - The SQL object
   // - Disconnect from SQL server (call when done)
   function sqlDC($con) {
      /* close connection */
      $con->close();
   }
?>
