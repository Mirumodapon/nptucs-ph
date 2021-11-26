import pwn

pwn.context.arch = 'arm64'
remote = pwn.remote('10.100.96.3', 10005)

for i in range(1000):
    line = remote.recvline().decode().split()
    line[0] = 16 if line[0] == 'Hex' else 2 if line[0] == 'Bin' else 8
    print(f'{i} > ', end='')
    for c in line[1:]:
        char = chr(int(c, line[0]))
        print(char, end='')
        remote.send(char.encode())
    print()
    remote.send(b'\n')

msg = remote.recv().decode()
print(msg)

remote.interactive()
remote.close()