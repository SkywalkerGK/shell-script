export _CT_NAMEREPORT='trigger_to_3bb_'`date --date='-1hour' '+%Y%m%d'_'%H00'`'.txt'
#trigger_to_3bb_20231116_0800.txt

# Auto
scp isp3bb@xx.xx.xx.172:/mountpoint/outputData/high_disconnect/report/$_CT_NAMEREPORT /var/www/html/lost_usage/abnormal_disconnect_hours/file

# Manual 
#scp isp3bb@xx.xx.xx.172:/mountpoint/outputData/high_disconnect/report/trigger_to_3bb_20231120_0600.txt /home/sorawit.sa/NOA/file

echo 'Success !'