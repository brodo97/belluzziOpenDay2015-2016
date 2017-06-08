import dispy, random, time, sys

# argv: [how many nodes][how many tests][how many rolls]

global ip_master
global ip_nodes_raw

ip_nodes = open("nodes.txt","r").read().split(",")
ip_nodes[len(ip_nodes)-1] = ip_nodes[len(ip_nodes)-1].rstrip("\n")

realPi = 3.14159265358


def drop (n):
    cross = 0
    import math
    for i in xrange(n):
        # x needle position
        x = random.random()*1000000
        # needle cos rotation degree
        d = math.cos(math.radians(random.random()*90))*50

        if int((x-d)/100) != int((x+d)/100):
            cross += 1

    return cross

def run (nTimes, nThrows):

    cluster = dispy.JobCluster(drop,nodes = ip_nodes)

    jobs = []

    for i in range(nTimes):
        jobs.append(cluster.submit(nThrows))

    cluster.wait()
    cluster.stats()

    prob = 0
    for j in jobs:
        prob += j.result

    pi = (2.0*int(sys.argv[1])*int(sys.argv[2]))/prob

    return pi

if __name__ == "__main__":

    tStart = time.time()

    calculatedPi = run(int(sys.argv[1]), int(sys.argv[2]))

    tEnd = time.time() - tStart

    print "Computation real time: " + str(tEnd)[:5] + " sec\n"

    print "Calculated PI: " + str(calculatedPi)
    print "Real PI:       " + str(realPi)
    print "Difference:    " + str(abs(realPi-calculatedPi)) + "\n"
