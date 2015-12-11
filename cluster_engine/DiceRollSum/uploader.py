import ftplib
import sys

psw = ""

if psw == "":
	print "Password NOT set!"
	exit()

ftp = ftplib.FTP('ftp.picluster.altervista.org','picluster', psw)

fResult = open("exports.csv",'rb')    
ftp.storbinary("STOR " + "exports.csv", fResult) 
fResult.close()

fResult = open("stats.txt",'rb')    
ftp.storbinary("STOR " + "stats.txt", fResult) 
fResult.close()

ftp.quit()

print "Done! http://picluster.altervista.org/index.php\n"