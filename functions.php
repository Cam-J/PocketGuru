<?php
//Function convert date from YYYY-MM-DD HH:MM:SSS to DD-MM-YYYY
function formatDate($date)
{
    //constituent components of the date
    // SUBSTR() <- returns part of the string
    // So this is going to take $date from the start (0) then 4 places 
    // which takes the $year variable, and so on for $month and $day.
    // Once these have been found we can then re-format it. 
    $year = substr($date, 0, 4);
    $month = substr($date, 5, 2);
    $day = substr($date, 8, 2);

    //new format
    $newFormat = $day."/".$month."/".$year ;
    //Return new format 
    return $newFormat ;

}
?>
<?php
//Function to reformat name to First Initial and last name
function formatName($name)
{
    //Find first initial in name.
    $firstInitial = ($name [0]);
    //Use strpos() to locate the space inside the name, and display everything
    //that is 1 character ahead. 
    // so we are going in to the $name variable
    // we are picking out the space with strpos()
    // and then we are displaying whatever is following the space. 
    $lastName = substr($name, strpos($name, " ")+1);

    //New format
    $newFormat = $firstInitial." ".$lastName ;
    return $newFormat ;
}