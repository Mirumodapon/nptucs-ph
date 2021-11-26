import pwn

pwn.context.arch = 'arm64'
remote = pwn.remote('10.100.96.3', 10003)

def gcd(a, b):
    if a < b:
        a, b = b, a
    r = a % b
    if r == 0:
        return b
    return gcd(b, r)

def lcm(a, b):
    g = gcd(a, b)
    return a * b // g

msg = remote.recv().decode()
print(msg)
print('=============')

for i in range(1000):
    line = remote.recv().decode().split()
    ans = 0
    req, num1 , num2 = line[3], int(line[5]), int(line[7])
    if (req == 'GCD'):
        ans = gcd(num1, num2)
    else:
        ans = lcm(num1, num2)
    print(f'{i} > {" ".join(line)} {ans}')
    remote.sendline(str(ans).encode())

msg = remote.recv().decode()
print(msg)

remote.interactive()
remote.close()