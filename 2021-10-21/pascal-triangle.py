def factorial (num):
    return num * factorial(num -1) if num > 0 else 1

def combination (n, a):
    return factorial(n) // factorial(a) // factorial(n - a)

input_string = input('Please enter a number: ')
input_number = int(input_string)

for i in range(input_number):
    for j in range(i+1):
        print(combination(i, j), end='\t')
    print()
