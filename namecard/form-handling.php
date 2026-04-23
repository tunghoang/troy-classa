<html>
<body>
<?php
print("Form handled");
?>
<div><h3>data sent from browser (querystring)</h3>
<?= $_GET['fullName'] ?>
<?= $_GET['gender'] ?>
<?= $_GET['position'] ?>
</div>
</body>
</html>
