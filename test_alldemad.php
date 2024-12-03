<?php
  require "./Classes/Demand.php";
  require_once "db.php";

  $demadAdmin = new Demand();
  $demands =    $demadAdmin->sortBy($conn);

  
  // function to give the color of the text depend the state
  function  stateColor($state)
  {
    switch ($state) {
      case 'Requested':
        echo "text-primary";
        break;

      case 'In Progress':
        echo "text-warning";
        break;
      case 'Ready For Take':
        echo "text-success";
        break;
      default:
        return "";
        break;
    }
  }
  
?>