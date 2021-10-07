//Program to simulate math quiz
//Written in and compiled using the Borland C compiler

#include <stdio.h>
#include <conio.h>//For clearing screens 

int main()
{
    int picker;//Used for menu options
    int num_questions;//For number of questions
    
    int right=0;//For counting right answers
    int wrong=0;//For counting wrong answer
    
    int answer1;//Each variable is used for initializing with its corrosponding question 
    int answer2;
    int answer3;
    int answer4;
    int answer5;
    
    do//To make sure it loops back to the starting menu at the beginning of the program
    {//do begin
        
    
        printf("\nWelcome to my maths program.To pick one of these options please enter [1],[2],[3],[4]\n");//Text for menu
        printf("\n1:How many questions would you like to be asked?(MAX 5)\n2:Start quiz?\n3:How many questions did you get right or wrong\n4:Exit program\n");
        scanf("%d",&picker);//For input for menu
        flushall();//To make sure the program doesnt close once you input a number
    
        switch(picker)//To use as a way to pick menu options using the picker variable
        {//switch begin
            case 1:
                clrscr();//To clear the screen to make the program seem more neat
                printf("\nHow many?\n");
                scanf("%d",&num_questions);
                
                right=0;//To reset score because user is starting new round
                wrong=0;
                
                if(num_questions==0||num_questions>5||num_questions<0)
                {   
                    clrscr();//to clear screen
                    printf("Error:Please enter a number valid within the range or proper input");//error checking
                }
                    
                flushall();
               
            break;
            
            case 2:
                    right=0;//to reset counters after every game
                    wrong=0;//to reset counters after every game
                    
                    clrscr();//to clear screen
                if(num_questions==0||num_questions>5||num_questions<0)//To make sure a correct amount of questions can actually be asked within the range ie error checking 
                {   
                    printf("Error:Please enter a number valid within the range or proper input");
                }
                    
                    
                else
                {
                         if (num_questions>=1)//>= used to make sure amount of questions inputted can be asked
                    {
                        printf("\nQuestion 1:7+3=?\n");
                        scanf("%d",&answer1);
                        flushall();
                        
                       
                        if(answer1==10)
                            {//if begin
                                printf("\nYou got it right!\n");
                                right++;//Used to keep track of the amount of questions correct for option 3 in the menu
                                
                            }//if end
                        else
                            {//else begin
                                printf("\nYou got it wrong,the correct answer is 10\n");
                                wrong++;//Used to keep track of the amount of questions wrong for option 3 in the menu
                                
                            }//else start
                    }
                    
                     if(num_questions>=2)
                    {
                        printf("\nQuestion 2:4-1=?\n");
                        scanf("%d",&answer2);
                        flushall();
                        
                        if(answer2==3)
                            {//if begin
                                printf("\nYou got it right!\n");
                                right++;
                                
                            }//if end
                        else
                            {//else begin
                                printf("\nYou got it wrong,the correct answer is 3\n");
                                wrong++;
                                
                            }//else end
                    }
                    
                    
                     if(num_questions>=3)
                    {
                        printf("\nQuestion 3:3.6/1.8=?\n");
                        scanf("%d",&answer3);
                        flushall();
                        
                        if(answer3==2)
                            {//if begin
                                printf("\nYou got it right!\n");
                                right++;
                                
                            }//if end
                        else
                            {//else begin
                                printf("\nYou got it wrong,the correct answer is 2\n");
                                wrong++;
                                
                            }//else end
                    }
                      
                      
                     if(num_questions>=4)
                    {    
                        printf("\nQuestion 4:15*3\n");
                        scanf("%d",&answer4);
                        flushall();
                            
                        if(answer4==45)
                            {//if begin
                                printf("\nYou got it right!\n");
                                right++;
                                
                            }//if end
                        else
                            {//else begin
                                printf("\nYou got it wrong,the correct answer is 45\n");
                                wrong++;
                                
                            }//else end
                    }
                    
                     if
                    (num_questions==5)
                    {
                        printf("\nQuestion 5:6*6-5\n");
                        scanf("%d",&answer5);
                        flushall();
                            
                        if(answer5==31)
                            {//if begin
                                printf("\nYou got it right!\n");
                                right++;
                                
                            }//if end
                        else
                            {//else begin
                                printf("\nYou got it wrong,the correct answer is 31\n");
                                wrong++;
                                
                            }//else end
                    } 
                    clrscr();//To clear screen
                }        
            break;
            
            case 3:
                
                if(right==0&&wrong==0)//To make sure the user actually takes the quiz first
                {//if begin
                    
                    printf("Please take the quiz first\n");
                }//if end
                else
                {//else begin
                    printf("Right:%d\n",right);//Displaying results from quiz 
                    printf("Wrong:%d\n",wrong);
                }//else end
                
            break;
            
            case 4:
                return 0;//to close down the program 
            break;
            
            default:
                printf("Error:Please enter a proper input\n");//To check for char inputs or inputs outside of menu range
            break;
           
            
        }//switch end
    }//do end
    
    while(picker != 4 );//To stop the menu loop once pressed
    
   
}
