from hashlib import md5

def MD5(_str):
  return md5(_str.encode('utf-8')).hexdigest()


replace = [32, 32, 32, 32]
def increase():
  replace[-1] += 1
  for i in range(3, -1, -1):
    carry = replace[i] // 127
    replace[i] %= 127
    replace[i - 1] += carry
    if (replace[i] == 0):
      replace[i] += 32
  return replace

while True:
  flag = 'PH{'
  for i in increase():
    flag += chr(i)
  flag += '}'
  if (MD5(flag) == 'dfb3d86e2f71fc381012b1beeba20937'):
    print(flag)

''' 上各教的做法
m = md5()
def MD5(_str):
  m.update(_str.encode('utf-8'))
  return m.hexdigest()

for i in range(32,127):
  for j in range(32,127):
    for k in range(32,127):
      for l in range(32,127):
        flag = 'PH{' + chr(i) + chr(j) + chr(k) + chr(l) + '}'
        if (MD5(flag) == 'dfb3d86e2f71fc381012b1beeba20937'):
          print(flag)
'''
