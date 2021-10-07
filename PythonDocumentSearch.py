def printdoc(documents):  # Function for searching documents
    doc = int(input("What document would you like?"))  # Used for picking documents from file
    if doc > len(documents):  # Error checking to make sure document stays in range
        print("Document out of range please give a valid answer")
    elif doc < 0:
        print("Document out of range please give a valid answer")
    else:
        print(documents[doc])  # takes input from user, converts it to int and uses it for indexing



def searchword(documents):
    searchdocuments = documents.copy()  # Deep copies contents of document list into new list to make function reusable
    index = {}  # Dictionary used for indexing words and what documents they appear in

    clear_punctuation = str.maketrans('', '', string.punctuation)  # maketrans() makes table that puts anything in string.punctuation to none
    for i in range(len(searchdocuments)):  # For loop for searching
        searchdocuments[i] = searchdocuments[i].translate(clear_punctuation).lower().split()  # Removes all punctuation using translate() lowers and splits everything

    for doc in searchdocuments:  # Goes through every string in list
        for word in doc:  # Goes through every every word in string
            if word not in index:  # If word not in index already it gets added by being added into a set
                index[word] = {searchdocuments.index(doc)}
            elif word in index:  # If word in index set gets updated with number of document
                index[word].add(searchdocuments.index(doc))

    try:  # Try for error exceptions
        answer = input("What word would you like to search for?").lower().split()  # Gets user while lowering it and splitting it fif user enters multiple words
        set2 = index.get(answer[0])  # Adds first word searched into set
        for enumerate in answer:  # Goes through list in case more search terms were inputted
            set2 = index.get(enumerate) & set2  # Finds everything common between sets ie every word entered
    except TypeError:  # If word or words don't exist the sets have nothing to compare to each other because theres no keyword to retrieve them with
        print("No word found, please try again")  # Error message
    else:
        print(set2)  # Prints result



import string

# Main function
with open("ap_docs.txt", "r") as file:  # Opens file puts it into variable and closes it
    documents = file.read().split("<NEW DOCUMENT>")  # reads file string and splits into a list based on <NEW DOCUMENT> using split()

while True:  # While loop to keep menu going
    picker = input('Option 1: Search for word \nOption 2: Search for file \nOption 3: Quit')  # Shows menu options
    if picker == "1":
        searchword(documents)  # Function for looking for specific word
    elif picker == "2":
        printdoc(documents)    # Function for printing specific document
    elif picker == "3":
        break
    else:
        print("Please give valid choice\n")  # Error message
