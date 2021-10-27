input_string = input('Please enter a number: ')
input_number = int(input_string)

output_arr = [0, 1]

while (len(output_arr) <= input_number):
    next_number = output_arr[-1] + output_arr[-2]
    output_arr.append(next_number)

print(output_arr)
