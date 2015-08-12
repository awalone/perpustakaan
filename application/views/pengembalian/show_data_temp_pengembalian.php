<?php

while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;
}
echo '{"members":'.json_encode($var).'}';