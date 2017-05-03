import dispy
import random
import time
import sys
import ftplib

# argv: [how many tests][how many rolls]

def twoDiceRollSum (n):
    result = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]

    for i in xrange(n):
        dice_a = random.randint(1, 6)
        dice_b = random.randint(1, 6)

        result[dice_a + dice_b - 2] += 1

    return result

def writer(res, path):

    data = [
        ["'Sum'", "'Frequency'"],
        ["'Two'", res[0]],
        ["'Three'", res[1]],
        ["'Four'", res[2]],
        ["'Five'", res[3]],
        ["'Six'", res[4]],
        ["'Seven'", res[5]],
        ["'Eight'", res[6]],
        ["'Nine'", res[7]],
        ["'Ten'", res[8]],
        ["'Eleven'", res[9]],
        ["'Twelve'", res[10]]
    ]

    fileWrite = open(path, "wb")
    try:
        for i in data:
            fileWrite.write("["+i[0]+","+str(i[1])+"],\n")
    finally:
        fileWrite.close()

def run (nTimes, nThrows):
    
    cluster = dispy.JobCluster(twoDiceRollSum)

    jobs = []

    for i in range(nTimes):
        jobs.append(cluster.submit(nThrows))

    cluster.wait()
    cluster.stats()

    result = [0]*11

    for j in jobs:
        for i in xrange(0,11):
            result[i] += j.result[i]

    return result

if __name__ == "__main__":

    tStart = time.time()

    result = run(int(sys.argv[1]), int(sys.argv[2]))

    tEnd = time.time() - tStart

    print "Computation real time: " + str(tEnd)[:5] + " sec"

    print "Total Rolls: " + str(int(sys.argv[1]) * int(sys.argv[2]))

    writer(result, "dice/export.txt")
