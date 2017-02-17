<?php
setcookie('mode', 'mobile', time() + 31556926, '/');
header("Location: ./");