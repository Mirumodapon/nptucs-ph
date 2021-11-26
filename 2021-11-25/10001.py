import pwn

pwn.context.arch = 'arm64'
remote = pwn.remote('10.100.96.3', 10001)

msg = remote.recvline().decode()
print(msg)
print('=============')

for i in range(1000):
    line = remote.recvline()
    print(f'{i} > {line.decode()[:-1]}')
    remote.send(line)

msg = remote.recv().decode()
print(msg)

remote.interactive()
remote.close()