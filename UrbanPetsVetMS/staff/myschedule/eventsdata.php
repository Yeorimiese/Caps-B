<?php
include("../connect.php");
session_start();

$res = mysqli_query($connection, "SELECT * FROM staffsched ORDER BY schedate, schedstarttime ASC;");
while($row = mysqli_fetch_array($res)){

    $getstaff = mysqli_fetch_array(mysqli_query($connection, "SELECT CONCAT(firstname, ' ', lastname) FROM staff WHERE userID = '" . $row["staffID"] . "';"));

    if($row["staffID"] == $_SESSION['staffuserID']){
        $data[] = array(
          'id'   => $row["id"],
          'title'   => 'My Schedule' . " " . date('h:ia', strtotime($row['schedstarttime'])) . " - " . date('h:ia', strtotime($row['schedendtime'])),
          'start'   => $row["schedate"] . 'T' . date('H:i:s', strtotime($row['schedstarttime'])),
          'end'   => $row["schedate"] . 'T' . date('H:i:s', strtotime($row['schedendtime'])),
          'color' => '#0052ba'
        );
    } else{
        $data[] = array(
          'id'   => $row["id"],
          'title'   => $getstaff[0] . " " . date('h:ia', strtotime($row['schedstarttime'])) . " - " . date('h:ia', strtotime($row['schedendtime'])),
          'start'   => $row["schedate"] . 'T' . date('H:i:s', strtotime($row['schedstarttime'])),
          'end'   => $row["schedate"] . 'T' . date('H:i:s', strtotime($row['schedendtime'])),
          'subject' => 'Subject 1',
          'color' => '#8b8b8b'
         );
    }

}

echo json_encode($data);