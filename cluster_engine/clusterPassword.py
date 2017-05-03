import dispy, time, sys

# argv: [password length]

def crackPassword (startPsw, stopPsw):
    import requests
    for i in xrange(startPsw, stopPsw):
        if requests.post("http://127.0.0.1/belluzziOpenDay2015-2016/picluster_website/secure/", data = {"pwd":i}).status_code == 200:
            return i
    return None

def run (numJobs, pswLength):
    cluster = dispy.JobCluster(crackPassword)

    unit = int((10**pswLength)/numJobs)+1
    jobs = []

    jobs.append(cluster.submit(1,unit))
    print 1,"-",unit
    for i in xrange(1,numJobs-1):
        print i*unit,"-",(i+1)*unit
        jobs.append(cluster.submit(i*unit,(i+1)*unit))
    jobs.append(cluster.submit((i+1)*unit,10**pswLength))
    print (i+1)*unit,"-",10**pswLength

    cluster.wait()
    cluster.stats()

    for j in jobs:
        if j.result is not None:
            return j.result

if __name__ == "__main__":

    tStart = time.time()

    crackedPassword = run(int(sys.argv[1]), int(sys.argv[2]))

    tEnd = time.time() - tStart

    print "Computation real time: " + str(tEnd)[:5] + " sec\n"

    print "Cracked password: " + str(crackedPassword)
    print "http://picluster.altervista.org/secure/\n"
