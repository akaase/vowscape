1. Extract vowscape.zip into your desired directory.

2. Import ceremonies.sql into your database from the "/exports/" folder. The database may be called
whatever you wish but make the name matches exactly on both the server and the db_configuration.php file
which should contain this PHP code to declare the global variables for the whole web app:

   <?php
   /* Database credentials. Assuming you are running MySQL
   server with default setting (user 'root' with no password) */
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_NAME', 'vowscape_db');                          //  This is what must match the db on the server
                                                              //  suggest using vowscape_db.
 
   /* Attempt to connect to MySQL database */
   $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
   // Check connection
   if($link === false){
       die("ERROR: Could not connect. " . mysqli_connect_error());
   }
   ?>

3.
Set permissions for configure.php read/write/execute
Set permissions for assets/pdf to read/write execute 
Set permissions for assets/imports to read/write/execute
Set permissions for assets/artist_images to read/write/execute
Set permissions for assets/images to read/write/execute
Set permissions for mpdf folder to read/write/execute
Set permissions for font folder to read/write/execute
Set permissions for Classes folder to read/write/execute

5. To keep default files, just leave the default folder structures as they are when uploading to the webserver.
