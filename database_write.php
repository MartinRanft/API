<!DOCTYPE php>
 <?php

    function updateAusbilder($ausbilder)
    {
         $updateQuery = "UPDATE `ausbilder` SET 
       `ausbilder_name` = ?, 
       `ausbilder_telefon` = ?, 
       `ausbilder_email` = ?,
        where ausbilder_id = ?"
        
        $preparedStatement = $connection->prepare($query);
        
        $preparedStatement->bind_param("sssii", $ausbilder->ausbilder_name, $ausbilder->ausbilder_telefon, $ausbilder->ausbilder_strasse, $ausbilder->ausbilder_id);
        
        $result = $preparedStatement->execute();
        
        return $result;
    }

    function updateBetrieb($betrieb)
    {
        $updateQuery = "UPDATE `betrieb` SET 
       `betrieb_name` = ?, 
       `betrieb_strasse` = ?, 
       `betrieb_telefon` = ?, 
       `plz_id` = ?
        where betrieb_id = ?"
        
        $preparedStatement = $connection->prepare($query);
        
        $preparedStatement->bind_param("sssii", $betrieb->betrieb_name, $betrieb->betrieb_strasse, $betrieb->betrieb_telefon, $betrieb->plz_id, $betrieb->betrieb_id);
        
        $result = $preparedStatement->execute();
        
        return $result;
    }    

    function updateSchueler($schueler, $columnsToUpdate)
    {
        $updateQuery = "UPDATE schueler SET lastname='Doe' WHERE id=?";
        
        $preparedStatement = $connection->prepare($query);
        
        $preparedStatement->bind_param("i", $schueler->id);
    }
    
    function writeChangesToDb($schuelerArray, $connection)
    {
        //for affected schuelerId do updateSchueler
        foreach($schuelerArray as $schueler) 
        {
            updateSchueler($schueler);
        }   
    }
    
 ?>