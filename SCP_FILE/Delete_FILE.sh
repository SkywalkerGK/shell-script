export _CT_NAMEREPORT='trigger_to_3bb_'`date --date='-7day' '+%Y%m%d'_*`'.txt'

echo $_CT_NAMEREPORT
cd /var/www/html/lost_usage/abnormal_disconnect_hours/file/
pwd
rm -rf $_CT_NAMEREPORT