<?php
 $hashedActualPassword = password_hash('123', PASSWORD_BCRYPT);
 echo $hashedActualPassword;
?>