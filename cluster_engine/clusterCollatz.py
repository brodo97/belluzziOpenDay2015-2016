import dispy
import time
import sys
import ftplib

# argv: [startRange][endRange]

def count_collatz_iter(nStart, nEnd):
    partial = [0]*1000
    for i in xrange(nStart,nEnd):
        count = 0
        while i>1:
            if i%2==0:
                i = i/2
            else:
                i = 3*i+1
            count += 1
        partial[count] += 1
    return partial

def run (nNode, nStart, nEnd):
    cluster = dispy.JobCluster(count_collatz_iter)

    jobs = []

    step = (nEnd-nStart)/nNode
    jobs.append(cluster.submit(nStart,step))
    for i in xrange(1,nNode-1):
        jobs.append(cluster.submit(i*step,(i+1)*step))
    jobs.append(cluster.submit((i+1)*step,nEnd))

    cluster.wait()
    cluster.stats()

    results = [0]*1000

    for j in jobs:
        for i in xrange(0,1000):
            results[i] += j.result[i]

    return results

def writer(res, path):
    fileWrite = open(path, "wb")
    try:
        for x,y in enumerate(res):
            if not y==0:
                fileWrite.write("["+str(x)+","+str(y)+"],\n")
    finally:
        fileWrite.close()

if __name__ == "__main__":

    tStart = time.time()

    result = run(int(sys.argv[1]), int(sys.argv[2]), int(sys.argv[3]))

    tEnd = time.time() - tStart

    print "Computation real time: " + str(tEnd)[:5] + " sec"

    writer(result, "collatz/export.txt")
