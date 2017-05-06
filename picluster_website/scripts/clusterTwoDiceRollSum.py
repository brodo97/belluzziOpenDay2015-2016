import dispy, sys

# argv: [how many tests][how many rolls]

def twoDiceRollSum (n): #Function passed to the node
    result = [0]*11
    import random
    for i in xrange(n): #Extract n times 2 random numbers from 1 to 6 (Faces of a dice)
        dice_a = random.randint(1, 6)
        dice_b = random.randint(1, 6)

        result[dice_a + dice_b - 2] += 1 #Increase the 'sum' position by one

    return result

def run (nTimes, nThrows):

    cluster = dispy.JobCluster(twoDiceRollSum) #Initialize the cluster: pass the function and eventually the list of node's ip

    jobs = [] #Initialize an array to store each sub results

    for i in range(nTimes): #Send to each node in the local network the number of throws
        jobs.append(cluster.submit(nThrows))

    cluster.wait() #Wait all the nodes
    cluster.stats() #Get cluster stats

    result = [0]*11

    for j in jobs: #Unificate each sub result
        for i in xrange(0,11):
            result[i] += j.result[i]

    return result #And finally return it

if __name__ == "__main__":
    result = run(int(sys.argv[1]), int(sys.argv[2]))
