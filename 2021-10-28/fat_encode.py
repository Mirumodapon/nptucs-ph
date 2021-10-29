from base64 import b32decode as base32
from base64 import b64decode as base64
from base64 import b85decode as base85

from gzip import decompress

my_file = open('./data', 'r')

compress_data = my_file.read()
data = base85(compress_data)

size = len(data)
for i in range(350):
    data = decompress(data)
    data_str = str(data)
    if data_str.find('!') != -1:
        data = base85(data)
        print('% > use base85 decode...', end='')
    elif data_str.find('+') != -1 or data_str.find('/') != -1:
        data = base64(data)
        print('% > use base64 decode...', end='')
    else:
        data = base32(data)
        print('% > use base32 decode...', end='')
    rate = len(data) / size * 100
    print(f'[{rate:.2f}%][{i + 1:3d}/350]')
    size = len(data)

print(str(data))
    
