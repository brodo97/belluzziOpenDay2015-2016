import time

alphabet = "abcdefghijklmnopqrstuvwxyz"
base = len(alphabet)

pw = "c0af77cf8294ff93a5cdb2963ca9f038"

def hackHash(start, end, base, alphabet, pw, passwordLength):
    import hashlib
    def baseN(num, base, alpha):
        return ((num == 0) and alpha[0]) or (baseN(num // base, base, alpha).lstrip(alpha[0]) + alpha[num % base])

    for i in xrange(start, end):
        word = baseN(i, base, alphabet).rjust(passwordLength, "a")
    return time.time()

if __name__ == "__main__":

    tStart = time.time()

    maxWordNumber = base**4

    tEnd = hackHash(0, maxWordNumber, base, alphabet, pw, 5) - tStart

    print maxWordNumber/tEnd,"words/s"
