<?php
if(isset($_POST['page_form']))
{
    switch ($_POST['page_form'])
    {
    case "1": // form 1 specific handling
        echo "form 1 submitted<br>";
        break;
    case "2": // form 2 specific handling
        echo "form 2 submitted<br>";
       break;
    default:
        die ("something's not right there");
    }

    // common handling
    foreach ($_POST as $var => $val) echo "$var => $val<br>";
}
?>

<form method="post">
<input type="text" name="test">
<input type="submit" name="submit">
<input type="hidden" name="page_form" value="1">
</form>

<form method="post">
<input type="text" name="test">
<input type="submit" name="submit">
<input type="hidden" name="page_form" value="2">
</form>
