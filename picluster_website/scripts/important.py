#Import dispy library
import dispy

#Create the cluster
cluster = dispy.JobCluster(compute) #'compute' is distributed to each machine in the local network running 'dispynode'
#or specify nodes' ip
cluster = dispy.JobCluster(compute, nodes=["NODE_1_IP","NODE_2_IP","etc.."]) #'compute' is distributed to each node running 'dispynode'

#Store partial results in the array 'jobs'
jobs = []
for i in range(20):
    job = cluster.submit(*args)
    jobs.append(job)

#Elaborate whatever data you need with partial results
for job in jobs:
    #Do something
