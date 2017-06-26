import dispy, time, sys, os

ip_nodes = open("nodes.txt","r").read().split(",")
ip_nodes[len(ip_nodes)-1] = ip_nodes[len(ip_nodes)-1].rstrip("\n")

alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
base = len(alphabet)

pw = "85738572271b1cedfd4f27f8a5654335"

def hackHash(start, end, base, alphabet, pw, passwordLength):
    import hashlib
    def baseN(num, base, alpha):
        return ((num == 0) and alpha[0]) or (baseN(num // base, base, alpha).lstrip(alpha[0]) + alpha[num % base])

    for i in xrange(start, end):
        # il metodo 'baseN' ora funziona, bisognava solo ricordarsi di aggiungere
        # questo 'rjust' che aggiunge il carattere specificato all'inizio della stringa
        # prima infatti cercando una password lunga 4 veniva: baseN(0) = 'a'
        # ora invece viene: baseN(0) = 'aaaa'
        word = baseN(i, base, alphabet).rjust(passwordLength, 'a')
        m = hashlib.md5()
        m.update(word.encode("utf-8"))

        if m.hexdigest() == pw:
            return word

    return None

def run(wordLength, packetSize):
    cluster = dispy.JobCluster(hackHash,nodes = ip_nodes)
    jobs = []

    maxWordNumber = base**wordLength

    for i in xrange(0, maxWordNumber - packetSize, packetSize):
        jobs.append(cluster.submit(i, i+packetSize, base, alphabet, pw, wordLength))

    # considero che la lunghezza del pacchetto potrebbe non essere un divisore di tutte la parole da cercare
    rest = maxWordNumber % packetSize
    if rest != 0:
        jobs.append(cluster.submit(maxWordNumber-rest, maxWordNumber, base, alphabet, pw, wordLength))

    cluster.wait()
    cluster.stats()

    for j in jobs:
        if j.result is not None:
            return j.result

if __name__ == "__main__":

    tStart = time.time()

    word = run(int(sys.argv[1]), int(sys.argv[2]))

    tEnd = time.time() - tStart

    print "Word: " + word
    print "Computation real time: " + str(tEnd)[:5] + " sec\n"
