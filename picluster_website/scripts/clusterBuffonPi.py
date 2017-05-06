import dispy, random, time, sys

# argv: [how many nodes][how many tests][how many rolls]

realPi = 3.14159265358

def drop (n):
    cross = 0

    for i in xrange(n):
        # x needle position
        x = random.random()*1000000
        # needle cos rotation degree
        d = math.cos(math.radians(random.random()*90))*50

        if int((x-d)/100) != int((x+d)/100):
            cross += 1

    return cross

def run (nNodes, nTimes, nThrows):

    cluster = dispy.JobCluster(drop)

    jobs = []

    for i in range(nTimes):
        jobs.append(cluster.submit(nThrows))

    cluster.wait()
    cluster.stats()

    prob = 0
    for j in jobs:
        prob += j.result

    pi = (2.0*int(sys.argv[2])*int(sys.argv[3]))/prob

    return pi

if __name__ == "__main__":

    tStart = time.time()

    calculatedPi = run(int(sys.argv[1]), int(sys.argv[2]), int(sys.argv[3]))

    tEnd = time.time() - tStart

    print "Computation real time: " + str(tEnd)[:5] + " sec\n"

    print "Total Rolls: " + str(int(sys.argv[2]) * int(sys.argv[3]))

    print "Calculated PI: " + str(calculatedPi)
    print "Real PI:       " + str(realPi)
    print "Difference:    " + str(abs(realPi-calculatedPi)) + "\n"