<?php
require 'functions.php';
require 'index.php';

function dump($value){
    return ($value);
    }
dump($_POST);
    
$pdo=connectToDb();

$data=[
    
 'Name' =>$_POST['name'],
 'Email'=>$_POST['email'],
 'Gender'=>$_POST['gender'],
 'City'=>$_POST['city']];

insert($pdo,'form',$data);

function insert($pdo,$table,$data){
    $sql="INSERT INTO $table SET";
    foreach ($data as $field=>$value){
        $fieldSQL[]="$field='$value'";

    }
    $sql .= ' '.implode(',',$fieldSQL);
    
    

    $statement=$pdo-> prepare($sql);
    $statement->execute();
}


?>

<html>
    <body>
        <center>
            
        <h1>Data Entries Table</h1>
        <table class='table'>
            <tr>
                
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>City</th>
            </tr>
        <?php
            $d=selectAll($pdo,'form','Form');
            foreach ($d as $form) {
            echo '<tr>';
            echo '</td>';
            echo '<td>';
            echo $form->Name;
            echo '</td>';
            echo '<td>';
            echo $form->Email;
            echo '</td>';
            echo '<td>';
            echo $form->Gender;
            echo '</td>';
            echo '<td>';
            echo $form->City;
            echo '</td>';
            echo '</tr>';
        }
        ?>
        </table>
        
       
    </center>
    </body>
</html>
