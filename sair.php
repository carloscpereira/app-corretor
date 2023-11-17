<?php

setcookie('cNome', '', time() - 3600);
setcookie('cId', '', time() - 3600);
setcookie('cGrupo', '', time() - 3600);
setcookie('cWhatsapp', '', time() - 3600);

header("Location: login.php");