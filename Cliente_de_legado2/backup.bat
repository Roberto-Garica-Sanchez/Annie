echo off
mysqldump -hlocalhost -uroot -proot empresa > empresa_%Date:~6,4%%Date:~3,2%%Date:~0,2%.sql
exit