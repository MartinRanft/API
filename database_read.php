<!DOCTYPE php>
 <?php

    function getFromDB($schueler, $connection)
    {
        $query = "select * from schueler s
                  left join ausbilder_schueler as ausc on ausc.schueler_schueler_id = s.schueler_id
                  left join ausbilder au USING(ausbilder_id)
                  left join betrieb b USING(betrieb_id)
                  left join plz p USING(plz_id)
                  left join richtung r USING(richtung_id)
                  left join klasse k USING(klasse_id)
                  where s.schueler_id = ?";
        
        $preparedStatement = $connection->prepare($query);
        
        $preparedStatement->bind_param("i", $schueler->id);
        
        $result = $preparedStatement->get_result();
        
        //write to schueler object and fill variables
    }
    
 ?>