<?php
$fileName = @$_FILES['student_csv']['tmp_name'];
$csv_helper = new CSVHelper;
if (!empty($fileName)) {
    $csv_helper->loadStudent($fileName);
}

class schueler
{
    public $schueler_id;
    public $schueler_vorame;
    public $schueler_nachname;
    public $schuler_strasse;
    public $schuler_betrieb;
    public $schueler_bestanden = false;
    public $schueler_abgang;
    public $schueler_ausbilder[];
    public $schuler_gdatum;
    public $plz;
    public $richtung;
    public $klasse;
    public $schueler_betriebsmail;
    public $schueler_privatmail;
    public &schueler_gruppe;
    
    /*
    public function __construct($firstName, $secondName, $lastName, $studentClass, $company, $field, $trainer, $birthday, $group)
    {
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->lastName = $lastName;
        $this->studentClass = $studentClass;
        $this->company = $company;
        $this->field = $field;
        $this->trainer = $trainer;
        $this->birthday = $birthday;
        $this->group = $group;
    }
    */
}

class ausbilder
{
    public $ausbilder_id;
    public $ausbilder_name;
    public $ausbilder_telefone;
    public $ausbilder_email;
    public $betrieb;
}

class betrieb
{
    public $betrieb_id;
    public $name;
    public $street;
    public $phone;
    public $city;
}

class klasse {
    public $id;
    public $name;
    public $year;
}

class plz
{
    public $id;
    public $city;
    public $postcode;
}

class richtung
{
    public $id;
    public $name;
    public $timeSpan;
}

class CSVHelper
{
    function loadStudent($file)
    {
        $student = new Student();
        if ($file != null) {
            $content = file_get_contents($file);
            $csv = str_getcsv($content, "\n");
            foreach($csv as $row_num => &$row) {
                if($row_num>0){
                    $row = str_getcsv($row, ";");
                    foreach($row as $num => $value){
                        if($value != "")
                        switch($num){
                            case 0:
                                echo "Nachname: " . $value;
                                $student->lastName = $value;
                                break;
                            case 1:
                                echo ", Vorname: " . $value;
                                $student->firstName = $value;
                                break;
                            case 2:
                                echo ", Gruppe: " . $value;
                                $student->group = $value;
                                break;
                            case 3:
                                echo ", Lehrjahr: " . $value;
                                $student->lastName = $value;
                                break;
                            case 4:
                                echo ", E-Mail: " . $value;
                                break;
                            case 5:
                                echo ", Unternehmen: " . $value;
                                break;
                            case 6:
                                echo ", Ausbilder: " . $value;
                                break;
                            case 7:
                                echo ", Ausbilder E-Mail: " . $value;
                                break;
                            case 8:
                                echo ", Ausbilder Tel.: " . $value;
                                break;
                            case 9:
                                echo ", Ausbilder alt.: " . $value;
                                break;
                            case 10:
                                echo ", Ausbilder alt. Tel.: " . $value;
                                break;
                            default:
                                echo ", UNDEFINED: " . $value;
                                break;
                        }
                    }
                    echo "<br/>";
                }
            }
        }
        return;
    }
}
?>