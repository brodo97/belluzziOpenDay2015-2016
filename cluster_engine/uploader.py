import ftplib
import sys

psw = open("psw.txt","r").read().rstrip("\n")
folder = sys.argv[1]

if psw == "":
	print "Password NOT set!"
	exit()

ftp = ftplib.FTP('ftp.picluster.altervista.org','picluster', psw)

try:
	fResult = open(folder + "/export.txt",'rb')
	ftp.cwd(folder)
	ftp.storbinary("STOR " + "export.txt", fResult)
	fResult.close()
except Exception as e:
	pass
try:
	fResult = open(folder + "/stats.txt",'rb')
	ftp.storbinary("STOR " + "stats.txt", fResult)
	fResult.close()
except Exception as e:
	pass

ftp.quit()

print "Done! http://picluster.altervista.org/index.php\n"
