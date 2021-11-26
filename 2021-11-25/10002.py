import pwn

pwn.context.arch = 'arm64'
remote = pwn.remote('10.100.96.3', 10002)

def whichSign(a, b, c):
    if a + b == c:
        return '+'
    elif a - b == c:
        return '-'
    elif a * b == c:
        return '*'
    elif a / b == c:
        return '/'
    elif a // b == c:
        return '//'
    else:
        return None

msg = remote.recvline().decode()
print(msg)
print('=============')

for i in range(100):
    line = remote.recvline().decode().split()
    remote.recvline()
    sign = ''
    num1, num2, num3 = int(line[0]), int(line[2]), int(line[4])
    sign = whichSign(num1, num2, num3)
    print(f'{i} > {num1} {sign} {num2} = {num3}')
    remote.sendline(sign.encode())

msg = remote.recv().decode()
print(msg)

remote.interactive()
remote.close()