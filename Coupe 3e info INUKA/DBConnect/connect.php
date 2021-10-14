        <?php
           function DBConnect()
           {
             try {
                $servername = 'localhost';
                $username = 'root';
                $password = 'root';
                
                //On établit la connexion
                $conn = new PDO("mysql:host=$servername;dbname=Coupe", $username, $password);
                return $conn;//on retourne la connexion
             } catch (\Exception $e) {
                echo 'Errreur de Connexion a la base'. $e->getMessage();
             }
           }
        ?>