//Program to simulate a lotto
//C19370156
//Sam O Teimhneain
//Written in and compiled using the Borland C compiler
//Finished on 03/03/2020

#include <stdio.h>
#include <conio.h> //For clearing screens 

#define A 7 //Both of these variables are one more than they should be to make sure they print correctly because of most for loop begins with 1 instead of 0
#define LIMIT 43 

void option1(int[],int[]); //All the functions for menu options 
void option2(int[]);
void option3(int[]);
void option4(int[]);
void option5(int[]);


int main()
{
    int input[A]; //Array used for inputting numbers
    int range[LIMIT]={0,}; //Index array for frequency checking
    
    int unlock=0; //Used to make sure user enters numbers first
    int picker; //Variable used to navigate menu with switch statement
    
    do
    { //Beginning of do while statement
        printf("Please select an option\n[1] Pick lotto numbers \n[2] Display numbers\n[3] Sort numbers\n[4] Compare chosen numbers to winning ones\n[5] Display frequency of numbers chosen\n[6] Exit"); //Menu text for showing options to user
        picker=0; //Error checking to make sure user cant input a character after choosing one of the options 
        scanf("%d",&picker); //Variable to be used in switch statement to navigate program
        flushall();
        
        switch(picker)
        { //Beginning of switch statement
            case 1:
                clrscr(); //To clear the screen to make the program seem more neat
                option1(input,range); //The input and range arrays are passed into the first function to be used for indexing and input for other functions
                unlock=1; //unlock variable is then set to 1 so other options are now aviable to user
                clrscr();
            break;
            
            case 2:
            if(unlock==1) //Error checking to make sure user actually enteres numbers first into the array      
            { //if begin  
                clrscr();
                option2(input); //input array passed into option2 to be displayed
            } //if end
            else
            { //else begin
                printf("Please input numbers first\n"); //To notify user that they need to enters number first through option 1
            } //else end
            break;
            
            case 3:
            if(unlock==1)  
            { //if begin   
                clrscr();
                option3(input); //input array passed into option3 to be sorted through bubble sort
                clrscr();
            } //if end
            else
            { //else begin
                printf("Please input numbers first\n");
            } //else end
            break;
            
            case 4:
            if(unlock==1)  
            { //if begin   
                clrscr();
                option4(input); //input array passed into option4 to check how many numbers entered were winning ones
            } //if end
            else
            { //else begin
                printf("Please input numbers first\n");
            } //else end
            break;
            
            case 5:
            if(unlock==1)  
            { //if being
                clrscr();
                option5(range); //Only range array is passed through to display frequency of entered numbers because its an index array
            } //if end
            else
            { //else begin
                printf("Please input numbers first\n");
            } //else end
            break;
            
            default:
                printf("Error:Please enter a proper input\n"); //To check for char inputs or inputs outside of menu range
            break;
            
            
        } //End of switch statement
        
    } //Do end
    
    while(picker!=6); //To close the menu and program completely when 6 is entered
        
}

void option1(int input [A],int range[LIMIT]) //First function lets user enter numbers into an array and indexes the frequency of the inputted numbers through a seperate array
{ //Start of function 1
    int i,j; //These variables in this and other functions are to indicate the places of characters in the arrays
    int nocopy[A]; //Array used for error checking to make sure user doesnt enter the same number twice
    printf("Please input six numbers,must be inbetween 1-42 and all must be unique"); //Text to instruct the user
    
    for(i=1;i<A;i++) //for loop for entering elements into array
    { //for begin     
        scanf("%d",&*(input+i));
        flushall();
        *(nocopy+i)=*(input+i); //To add values to the copy array
        for(j=1;j<i;j++) //for loop for error checking
        { //for begin   
            if(*(input+i)<=0||*(input+i)>42||*(input+i)== *(nocopy+j)) //Error checking to make sure the user didnt input the same number more than once and not less or more that 42
            { //if begin
                do //Put in a do while loop to loop until the user inputs something correct
                { //do begin
                    while(*(input+i)<=0||*(input+i)>42) //Another if statement is put to specify the error to the user ie outisde the range of acceptable numbers
                    { //while begin 
                        printf("\nError please input a number between 1-42\n");
                        scanf("%d",&*(input+i));
                        flushall();
                        *(nocopy+i)=*(input+i); 
                    } //while end
                        
                    while(*(input+i)==*(nocopy+j)) //To specify to the user to enter a unique variable
                    { //while begin
                        printf("\nError please input a unique number\n");
                        scanf("%d",&*(input+i));
                        flushall();
                        *(nocopy+i)=*(input+i);
                    } //while end
                } // do end
                while(*(input+i)<=0||*(input+i)>42||*(input+i)== *(nocopy+j)); //Conditions to the prompt loop until the user enters the correct input ie in the range or a unique number
               
            } //if end
        } //for end
        (*(range+*(input+i)))++; //How program counts the frequency of numbers entered,the number thats entered into the input array becomes the placement in the range array and is then incremented by 1
    } //for end
} //End of function 1

void option2(int input[A]) //Second function prints the numbers into the array from option 1
{ //Start of function 2
    int i;
    for(i=1;i<A;i++) //for loop to print all the elements in an array  
    { //for begin
        printf("%d\n",*(input+i));
    } //for end
} //End of function 2

void option3(int input[A]) //Third function organises array in order using the bubble sort algorithim 
{ //Start of function 3
    int i,j; 
    int temp; //Temporary variable for storing value when arranging array
    for(i=0;i<A-1;i++) //for loop for bubble sort
    { //for begin
        for(j=1;j<A-i-1;j++)
        { //for begin
            if(*(input+j)> *(input+j+1))
            { //if begin
                temp=*(input+j);
                *(input+j)=*(input+j+1);
                *(input+j+1)=temp;
            } //if end
        } //for end
    } //for end
} //End of function 3

void option4(int input[A]) //Fourth function checks how many values the user entered in the array from function 1 matches the winning numbers
{ //Start of function 4
    int winning[6]={1,3,5,7,9,11}; //Array filled with winning numbers to compare to
    int i,j;
    int checker=0; //Variable to check how many numbers the user got right
    for(i=1;i<A;i++) //for loop to check how many values user entered matched winning numbers
    { //for begin
        *(input+i);
         for(j=0;j<A;j++)
         { //for begin 
             if(*(input+i)==*(winning+j))
             { //if begin
                 checker++;
             } //if end
         } //for end
    } //for end
     if(checker<3) //If the user guessed the right numbers the if and if else statements will tell them what prizes theyll win if any at all through the checker value
     { //if begin
         printf("\nSorry you didnt win anything\n");
     } //if end
     else if(checker==3)
     { //else if begin
         printf("\nYou got 3 numbers,you win a Cinema Pass\n");
     } //else if end
     else if(checker==4)
     { //else if begin
          printf("\nYou got 4 numbers,you win a Weekend Away\n");
     } //else if end
     else if(checker==5)
     { //else if begin
          printf("\nYou got 5 numbers,you win a New Car\n");
     } //else if end
    else if(checker==6)
     { //else if begin
          printf("\nYou got all 6 numbers,you win the Jackpot\n");
     } //else if end
} //End of function 4

void option5(int range[LIMIT]) //Fifth function shows the frequency of numbers entered into the input array over the total runtime of the program
{ //Start of function 5 
    int i;
    
    for(i=1;i<LIMIT;i++) // Scroll through the entirity of the index array in order
    { //for loop begin
        if(*(range+i)>0) //Only prints if said value is greater than 0 ie meaning its been inputted
        { //if begin
        printf("%d:%d\n",i,*(range+i));
        } //if end
               
    } //for loop end   

} //End of function 5
