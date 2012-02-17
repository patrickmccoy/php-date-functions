<?php
require dirname(__FILE__) .'/DateUtil.class.php';

echo "+1 year: ". DateUtil::time_ago('+1 year')."\n";
echo "+1 month: ".DateUtil::time_ago('+1 month')."\n";
echo "+1 week: ".DateUtil::time_ago('+1 week')."\n";
echo "+4 days: ".DateUtil::time_ago('+4 day')."\n";
echo "+3 hours: ".DateUtil::time_ago('+3 hour')."\n";
echo "+2 minutes: ".DateUtil::time_ago('+2 minute')."\n";
echo "+20 seconds: ".DateUtil::time_ago('+20 seconds')."\n";
echo "-1 year: ".DateUtil::time_ago('-1 year')."\n";
echo "-1 month: ".DateUtil::time_ago('-1 month')."\n";
echo "-1 week: ".DateUtil::time_ago('-1 week')."\n";
echo "-4 days: ".DateUtil::time_ago('-4 day')."\n";
echo "-3 hours: ".DateUtil::time_ago('-3 hour')."\n";
echo "-2 minutes: ".DateUtil::time_ago('-2 minute')."\n";
echo "-20 seconds: ".DateUtil::time_ago('-20 seconds')."\n";
