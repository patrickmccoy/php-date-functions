<?php
include('time_functions.php');

echo "+1 year: ".time_ago('+1 year')."\n";
echo "+1 month: ".time_ago('+1 month')."\n";
echo "+1 week: ".time_ago('+1 week')."\n";
echo "+4 days: ".time_ago('+4 day')."\n";
echo "+3 hours: ".time_ago('+3 hour')."\n";
echo "+2 minutes: ".time_ago('+2 minute')."\n";
echo "+20 seconds: ".time_ago('+20 seconds')."\n";
echo "-1 year: ".time_ago('-1 year')."\n";
echo "-1 month: ".time_ago('-1 month')."\n";
echo "-1 week: ".time_ago('-1 week')."\n";
echo "-4 days: ".time_ago('-4 day')."\n";
echo "-3 hours: ".time_ago('-3 hour')."\n";
echo "-2 minutes: ".time_ago('-2 minute')."\n";
echo "-20 seconds: ".time_ago('-20 seconds')."\n";

?>