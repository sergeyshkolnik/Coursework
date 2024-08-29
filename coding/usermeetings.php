<!DOCTYPE html>
<head>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel = 'stylesheet' href = 'coursework.css'>
        

       
    <style>
        /* calendar */
    table.calendar		{ border-left:1px solid #999; }
    tr.calendar-row	{  }
    td.calendar-day	{ 
        height:120px; 
        font-size:14px; 
        position:relative; 
        text-align:center; } 
    * html div.calendar-day { height:120px; }
    td.calendar-day:hover	{ background:#eceff5; }
    td.calendar-day-np	{ 
        background:#eee; 
        min-height:120px; } 
    * html div.calendar-day-np { height:120x; }
    td.calendar-day-head { 
        background:#ccc; 
        font-weight:bold; 
        text-align:center; 
        width:120px; 
        padding:5px; 
        border-bottom:1px solid #999; 
        border-top:1px solid #999; 
        border-right:1px solid #999; }
    div.day-number		{ 
        position:absolute;
        top:5px;
        right:5px;
        background:#343a40; 
        padding:5px; 
        color:#fff; 
        font-weight:bold; 
        float:right; 
        margin:-5px -5px 0 0; 
        width:25px; 
    }
    /* shared */
    td.calendar-day, td.calendar-day-np { 
        width:120px; 
        padding:5px; 
        border-bottom:1px solid #999; 
        border-right:1px solid #999; }
    .boxy{
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    
    }
</style>
</head>
<body>

<div id="navigation"></div>


<?php
include('connection.php');
session_start();
function build_html_calendar($year, $month, $events = null) {

    // CSS classes
    $css_cal = 'calendar';
    $css_cal_row = 'calendar-row';
    $css_cal_day_head = 'calendar-day-head';
    $css_cal_day = 'calendar-day';
    $css_cal_day_number = 'day-number';
    $css_cal_day_blank = 'calendar-day-np';
    $css_cal_day_event = 'calendar-day-event';
    $css_cal_event = 'calendar-event';
  
    // Table headings
    $headings = ['M', 'T', 'W', 'T', 'F', 'S', 'S'];
  
    // Start: draw table
    $calendar =
      "<table cellpadding='0' cellspacing='0' class='{$css_cal}'>" .
      "<tr class='{$css_cal_row}'>" .
      "<td class='{$css_cal_day_head}'>" .
      implode("</td><td class='{$css_cal_day_head}'>", $headings) .
      "</td>" .
      "</tr>";
  
    // Days and weeks
    $running_day = date('N', mktime(0, 0, 0, $month, 1, $year));
    
    $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
    
    // Row for week one
    $calendar .= "<tr class='{$css_cal_row}'>";
  
    // Print "blank" days until the first of the current week
    for ($x = 1; $x < $running_day; $x++) {
      $calendar .= "<td class='{$css_cal_day_blank}'> </td>";
    }
  
    // Keep going with days...
    for ($day = 1; $day <= $days_in_month; $day++) {
  
      // Check if there is an event today
      $cur_date = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
      $draw_event = false;
      if (isset($events) && isset($events[$cur_date])) {
        $draw_event = true;
      }
  
      // Day cell
      $calendar .= $draw_event ?
        "<td class='{$css_cal_day} {$css_cal_day_event}'>" :
        "<td class='{$css_cal_day}'>";
  
      // Add the day number
      $calendar .= "<div class='{$css_cal_day_number}'>" . $day . "</div>";
  
      // Insert an event for this day
      if ($draw_event) {
        
        $calendar .=
          "<div class='{$css_cal_event}'>" .
          $events[$cur_date]['text'] .
          
        "<form action = 'viewevents.php' method = 'POST'>
         <input type = 'hidden' name = 'date' value = '{$cur_date}'>
         <input type = 'submit' value = 'View all events'></input>
         </form>
         </div>";
      }
  
      // Close day cell
      $calendar .= "</td>";
  
      // New row
      if ($running_day == 7) {
        $calendar .= "</tr>";
        if (($day + 1) <= $days_in_month) {
          $calendar .= "<tr class='{$css_cal_row}'>";
        }
        $running_day = 1;
      }
  
      // Increment the running day
      else {
        $running_day++;
      }
  
    } // for $day
  
    // Finish the rest of the days in the week
    if ($running_day != 1) {
      for ($x = $running_day; $x <= 7; $x++) {
        $calendar .= "<td class='{$css_cal_day_blank}'> </td>";
      }
    }
  
    // Final row
    $calendar .= "</tr>";
  
    // End the table
    $calendar .= '</table>';
  
    // All done, return result
    return $calendar;
  };
  
  $stmt = $conn->prepare("SELECT StartTime FROM TblMeetings
  INNER JOIN TblUsers ON TblMeetings.UserID = TblUsers.UserID
  WHERE Forename = :name AND Agreed_by_coach = 1");
  $stmt->bindParam(':name', $_SESSION['user']);
  $stmt->execute();

  
  
  $events=array();
  #creates associative array of associative arrays for calendar
  
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
    $datetime = $row['StartTime'];
    
    $date = date('Y-m-d', strtotime($datetime));
    
    $time = date('H:i', strtotime($datetime));
    print_r($time);
    //separates the date and the time
    if (array_key_exists($row['StartTime'],$events))
    {
        $events[$date]['text']=$events[$row[$date]]['text']."<br>".$time;
        
    }else{
        $events[$date]=array('text'=>$time);
        
    }

  }
  for($x=0;$x<=2;$x++){
    $year=date('Y');
    $month=date('m')+$x;
    if($month>12){
       $month=$month-12;
       $year+=1;
    }
    
    $monthName = date("F", mktime(0, 0, 0, $month, 10));
    echo "<h2 style='text-align:center'>".$monthName." ".$year."</h2>";
    echo "<div class='boxy'>";
    echo build_html_calendar($year, $month,$events);
    echo "</div>";   
}
?>
</body>
</html>