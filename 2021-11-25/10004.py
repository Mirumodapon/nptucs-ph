import pwn

pwn.context.arch = 'arm64'
remote = pwn.remote('10.100.96.3', 10004)

for i in range(1000):
    line = remote.recvline().decode().split()
    print(f'{i} > ', end='')
    for c in line:
        char = chr(int(c))
        print(char, end='')
        remote.send(char.encode())
    print()
    remote.send(b'\n')

msg = remote.recv().decode()
print(msg)

remote.interactive()
remote.close()