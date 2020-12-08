<?php
$fileName = @$_FILES['student_csv']['tmp_name'];
$csv_helper = new CSVHelper;
if (!empty($fileName)) {
    $csv_helper->loadStudent($fileName);
}

class Student
{
    public $id;
    public $firstName;
    public $secondName;
    public $lastName;
    public $street = "";
    public $postcode = "";
    public $studentClass;
    public $company;
    public $field;
    public $passed = false;
    public $gone = false;
    public $trainer = [];
    public $birthday;
    public $group;
    
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

class Trainer
{
    public $id;
    public $name;
    public $phone;
    public $email;
}

class Company
{
    public $id;
    public $name;
    public $street;
    public $phone;
    public $city;
}

class StudentClass {
    public $id;
    public $name;
    public $year;
}

class City
{
    public $id;
    public $city;
    public $postcode;
}

class Field
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
                                break;
                            case 1:
                                echo ", Vorname: " . $value;
                                break;
                            case 2:
                                echo ", Gruppe: " . $value;
                                break;
                            case 3:
                                echo ", Lehrjahr: " . $value;
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