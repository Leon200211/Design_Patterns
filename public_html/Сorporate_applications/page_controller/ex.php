<?php

try {
    $venuemapper = new VenueMapper();
    $venues = $venuemapper->findAll();
} catch (\Exception) {
    include('error.php');
    exit(0);
}


// Далее идет страница по умолчанию
?>
<html>
<head>
    <title>titlr</title>
</head>
<body>
<h1>CnncoK заведений</h1>
    <?php foreach ($venues as $venue) { ?>
        <?php print $venue->getName(); ?><br />
    <?php } ?>
</body>
</html>