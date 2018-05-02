#include <stdio.h>
#include <math.h>
int main()
{
    //2
    /*int number1, number2;

    printf("1st number:\n");
    scanf("%i", &number1);
    printf("\n");

    printf("2nd number:\n");
    scanf("%i", &number2);
    printf("\n");

    int divisionOfRemainder;
    if ((divisionOfRemainder = number1 % number2) == 0) {
        printf("There isn't remainder of the division");
    } else {
        printf("There is remainder of the division: %i\n", divisionOfRemainder);
    }*/

    //3
    /*int number1, number2;
    printf("1st number:\n");
    scanf("%i", &number1);
    printf("\n");

    do {
        printf("2nd number:\n");
        scanf("%i", &number2);
        printf("\n");
        if (number2 == 0) {
            printf("2nd number cant't be 0\n");
        }
    } while (number2 == 0);

    printf("%i / %i = %.3f", number1, number2, (float) number1 / number2);*/

    int initNumber;


    printf("Init number: ");
    scanf ("%i", &initNumber);
    int temp = 0;
    do {
        temp = initNumber % 10;
        initNumber /= 10;

        switch (temp) {
            case 0 : {printf("zero "); break;}
            case 1 : {printf("one "); break;}
            case 2 : {printf("two "); break;}
            case 3 : {printf("three "); break;}
            case 4 : {printf("four "); break;}
            case 5 : {printf("five "); break;}
            case 6 : {printf("six "); break;}
            case 7 : {printf("seven "); break;}
            case 8 : {printf("eight "); break;}
            case 9 : {printf("nine "); break;}
        }
    } while (initNumber > 0);
}