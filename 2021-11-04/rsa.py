from Crypto.Util.number import inverse as inv

n = 0
C = 0
e = 0

p = 0
q = 0
r = 0

phi = (p - 1) * (q - 1) * (r - 1)


d = inv(e, phi)
print(pow(C, d, n))
