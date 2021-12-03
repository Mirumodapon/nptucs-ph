import PIL import Image

img = Image.open('q5.png')
row = img.size[0]

for i in range(row):
    px = img.getpixel((row,0))
    lbs = px & 1
    print(lbs, end='')

