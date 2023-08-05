<?php
$addvenue = new AddVenueController();
$addvenue->init();
$addvenue->process();
?>


<html>
<head>
    <title>Добавление заведения</title>
</head>
<body>
<h1>Добавление заведения</h1>
<table>
    <tr>
        <td>
<?php
    print $request->getFeedbackString("</td></tr><tr><td>");?>
        </td>
    </tr>
</table>
<form action="/addvenue.php" method="get">
    <input type="hidden" name=nsubmitted" value="yes"/>
    <input type="textM name="venue name" />
</form>
</body>
</html>