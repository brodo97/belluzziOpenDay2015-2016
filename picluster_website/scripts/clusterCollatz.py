import dispy, sys

# argv: [startRange][endRange]

def count_collatz_iter(nStart, nEnd): #Function passed to the node (Ask for a range of numbers)
    partial = [0]*1000 #Create a plentiful array to store each number's numbers of iteration
    for i in xrange(nStart,nEnd):
        count = 0
        while i>1:
            if i%2==0: #If the current number is divisible by 2
                i = i/2 #Divide it by 2
            else:
                i = 3*i+1 #Multiply it by 3 and add 1
            count += 1 #Also increase the iterations count
        partial[count] += 1 #When the number reach 1 increase the 'count' position of the array
    return partial

def run (nNode, nStart, nEnd):
    cluster = dispy.JobCluster(count_collatz_iter) #Create the cluster

    jobs = [] #Initialize an array to store each sub results

    step = (nEnd-nStart)/nNode #Calculate each range length
    jobs.append(cluster.submit(nStart,step)) #Submit the first job
    for i in xrange(1,nNode-1):
        jobs.append(cluster.submit(i*step,(i+1)*step)) #Submit the remaining jobs - 1
    jobs.append(cluster.submit((i+1)*step,nEnd)) #Submit the last job

    cluster.wait() #Wait all nodes
    cluster.stats() #Get stats

    results = [0]*1000

    for j in jobs: #Unificate each sub result
        for i in xrange(0,1000):
            results[i] += j.result[i]

    return results

if __name__ == "__main__":
    result = run(int(sys.argv[1]), int(sys.argv[2]), int(sys.argv[3]))
