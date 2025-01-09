import sys
import re

def identify_hash(hash_string):
    hash_types = {
        "MD5": r"^[a-fA-F0-9]{32}$",
        "SHA-1": r"^[a-fA-F0-9]{40}$",
        "SHA-256": r"^[a-fA-F0-9]{64}$",
        "SHA-512": r"^[a-fA-F0-9]{128}$",
    }
    for hash_type, regex in hash_types.items():
        if re.match(regex, hash_string):
            return hash_type
    return "Inconnu"

if __name__ == "__main__":
    if len(sys.argv) > 1:
        hash_input = sys.argv[1]
        hash_type = identify_hash(hash_input)
        print(hash_type)  # Affiche le résultat pour le PHP
    else:
        print("Aucun hash fourni")
