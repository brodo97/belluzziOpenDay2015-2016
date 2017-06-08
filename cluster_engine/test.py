n = 144
nNode = 4
nStart = 3
step = (int(n**0.5+1)-nStart)/nNode
print nStart,step
for i in xrange(1,nNode-1):
    print i*step,(i+1)*step
print (i+1)*step,int(n**0.5+1)
