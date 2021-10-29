topic = '80 01001000 01111011 0167 0x65 0156 121 0145 01100101 0137 98 97 0x64 01100111 0145 0x72 01011111 103 0x61 0x6d 101 01111101';

topic_arr = topic.split(' ')
flag = ''
for i in topic_arr:
    if (len(i) == 8):
        flag += chr(int(i, 2))
    elif (i[0] == '0'):
        if (i[1] == 'x'):
            flag += chr(int(i, 16))
        else:
            flag += chr(int(i, 8))
    else:
        flag += chr(int(i))

print(flag)
