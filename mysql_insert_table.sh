#!/bin/bash 

export _LASTMONTH=`date --date='-1month' '+%Y-%m-01'` 
#export _LASTMONTH=`date '+%Y-%m-01'`

mysql -u root -h xx.xx.xx.208 allot -p'$-AJhxWP8@yyjv@6' <<EOF

INSERT INTO tbl_bw_media (fdate, media, useronline_dl,useronline_ul, download, upload, remark)
select fdate, media, useronline_dl,useronline_ul, download, upload, remark 
from tbl_bw_media_bass 
where fdate = '$_LASTMONTH' and media In ('xDSL','FTTx','TOTAL') ;

EOF