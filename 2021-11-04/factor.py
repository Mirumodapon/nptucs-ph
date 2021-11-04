'''
將一個數，質因數分解
'''

class Prime:
  def __init__(self):
    self.count = 1
    self.arr = []

  def isPrime(self,n):
    for i in self.arr:
      if (self.count % i == 0):
        return False
    else:
      return True
  
  def findNext(self):
    self.count += 1
    while True:
      if (self.isPrime(self.count)):
        self.arr.append(self.count)
        break
      else:
        self.count += 1
    return self.count

  def max(self):
    return len(self.arr) and self.arr[-1] or 0
  


prime = Prime()

user_input = 1565546333337
n = user_input
output = []

while(pow(prime.max(),2) < user_input):

  temp = prime.findNext()
  if (n % temp == 0):
    output.append(temp)
    n //= temp
else:
  output.append(n)

print(output)
