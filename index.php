<!DOCTYPE html>
<html>
    <head><title>Hello World</title></head>
    <body>

    <button type="submit" style='background-color: red'>Suchen</Button>

        <form>
            <input type="text" name="Name" /><br/>
            <button type="submit" style='background: 0.5, 0.5, 0.5'>Suchen</Button>

        </form>

        <script>
            button = document.querySelector('button');
            button.addEventListener('click', Searchdatabase);
            console.log(document.querySelector('button'));

            function Searchdatabase(event){
                event.target.style = 'background-color: green'
            }
        </script>

<form action="index.php" method="get">
    Suchbegriff: <input type="text" name="suchbegriff" value="<?php echo $_GET['suchbegriff'];?>">
    
    <input type="submit" value="Suchen">
    
</form>

        <table border="1">

        <?php
            require_once("inc/db_login.inc.php");
            $mysqli = db_login("webshop");
            //$suche = $_GET['suchbegriff'];
            $query = $mysqli->escape_string($_GET['suchbegriff']);
            $query = 'SELECT * FROM produkte where name like "%' . $query . '%"';
            echo $query;
            $result = $mysqli->query($query);
            echo "<tr>\n";
            while ($field = $result->fetch_field()) {
                
                    echo " <th> $field->name</th> \n";
                
                
            }

            echo "</tr>\n";

            while ($produkte = $result->fetch_object()) {
                echo "<tr>\n";
                foreach ($produkte as $key => $value) {
                    echo " <td> $value</td> \n";
                }

                echo "</tr>\n";
                
                
            }


            Echo $_GET['suchbegriff']


            
        ?>

        

        </table>
    </body>
</html>