prime_arr = [];

input_string = input('Please enter a number: ')
input_number = int(input_string)

for i in range(2, input_number):
    for j in prime_arr:
        if (i % j == 0):
            break
    else:
        prime_arr.append(i)

print(prime_arr)
