<?php

include("subscribe.php");
$account_email = filter_input(INPUT_COOKIE, 'email');

subscribe($account_email);

include("html/header.php");
include("html/subscribed.html");
include("html/footer.html");

