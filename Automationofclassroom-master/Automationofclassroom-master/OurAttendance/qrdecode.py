from  pyzbar.pyzbar import decode
from PIL import Image
import os
os.system("ToughX.png")
decoded = decode(Image.open("ToughX.png"))
print(decoded)
