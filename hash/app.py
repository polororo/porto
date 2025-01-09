import sys
import re

def identify_hash(hash_string):
    hash_types = {
        "MD5": r"^[a-fA-F0-9]{32}$",
        "SHA-1": r"^[a-fA-F0-9]{40}$",
        "SHA-224": r"^[a-fA-F0-9]{56}$",
        "SHA-256": r"^[a-fA-F0-9]{64}$",
        "SHA-384": r"^[a-fA-F0-9]{96}$",
        "SHA-512": r"^[a-fA-F0-9]{128}$",
        "RIPEMD-128": r"^[a-fA-F0-9]{32}$",
        "RIPEMD-160": r"^[a-fA-F0-9]{40}$",
        "NTLM": r"^[a-fA-F0-9]{32}$",
        "LM": r"^[a-fA-F0-9]{32}$",
        "MySQL3.23": r"^[a-fA-F0-9]{16}$",
        "MySQL4+": r"^[a-fA-F0-9]{40}$",
        "CRC32": r"^[a-fA-F0-9]{8}$",
        "ADLER32": r"^[a-fA-F0-9]{8}$",
        "Whirlpool": r"^[a-fA-F0-9]{128}$",
        "Tiger-192": r"^[a-fA-F0-9]{48}$",
    }
    
    for hash_type, regex in hash_types.items():
        if re.match(regex, hash_string):
            return hash_type
    return "Inconnu"

if __name__ == "__main__":
    if len(sys.argv) > 1:
        hash_input = sys.argv[1]
        hash_type = identify_hash(hash_input)
        print(hash_type)  
    else:
        print("Aucun hash fourni")
