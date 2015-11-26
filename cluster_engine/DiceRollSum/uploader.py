import ftplib
import sys

ftp = ftplib.FTP('ftp.picluster.altervista.org','picluster', sys.argv[1])

for i in range(2, len(sys.argv)):
    fResult = open(sys.argv[i],'rb')    
    ftp.storbinary("STOR " + sys.argv[i], fResult) 
    fResult.close()

ftp.quit()

print "Done! http://picluster.altervista.org/index.php\n"