axis = '/*-+\][;';

table = [
    '{EFUilYO',
    'Qpcsouwe',
    'rwPB4Hkq',
    'aCh1dS3T',
    'Xx0ML_9y',
    'mRDf85Jl',
    'Gtb6v}72',
    'gNzVZjnK'
]

topic = '-- ]- // [* [+ [; ;\ [+ [+ ]\ [* /+ [; *[ ]\ *[ -\ ]\ ]] ++ [+ [+ ** ]\ [* \/ *[ -+ ]\ ;\ -\ ]* ]['

topic_arr = topic.split(' ')

flag = ''
for i in topic_arr:
    x = axis.find(i[0])
    y = axis.find(i[1])
    flag += table[y][x]

print(flag)
