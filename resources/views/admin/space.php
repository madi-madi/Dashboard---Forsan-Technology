<?php

$total = disk_total_space('/');

echo "Total Space Server : $total ";

$free = disk_free_space("/");

echo "Free Space Server : $free ";