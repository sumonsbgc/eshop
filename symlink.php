<?php
$targetFolder = '/home/chanbwkk/eshop/storage/app/public';
$linkFolder = '/home/chanbwkk/shopping.helpplusbd.com/public/storage';


symlink($targetFolder,$linkFolder);
echo readlink($linkFolder);
echo "success";



?>