<?php
unset($_COOKIE['login']);
setcookie('login',"",time()-3600);
unset($_COOKIE['employee_name']);
setcookie('employee_name',"",time()-3600);
header('Location: index.html');
?>