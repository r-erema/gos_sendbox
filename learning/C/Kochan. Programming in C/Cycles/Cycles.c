#include <stdio.h>
#include <math.h>
int main()
{
    /*int number, triangularNumber = 0;
    scanf ("%i", &number);

    printf ("TABLE OF TRIANGULAR NUMBERS\n\n")/
    printf (" n Sum from 1 to n\n");
    printf ("-------------------- \n");
    for (int n = 1; n <= number; n++) {
        triangularNumber += n;
        printf (" %3i                  %i\n", n, triangularNumber);
    }*/

    //2
    float num;
    printf (" n             n^2\n");
    printf ("-------------------- \n");
    for (num = 1; num <= 10; num++) {
        printf ("%2f             %f\n", num, pow(num, 2));
    }
    printf ("-------------------- \n\n");

    //3
    int i, j;
    printf ("Triangle numbers: \n");
    for (i = 5; i <= 50; i += 5) {
        printf ("%i: %f\n", i, (float) i * (i + 1) / 2);
    }
    printf ("-------------------- \n\n");

    printf ("Factorials: \n");
    for (i = 1; i <= 10; i++) {
        int tmp = 1;
        for (j = 1; j <= i; j++) {
            tmp *= j;
        }
        printf ("%2i!: %i\n", i, tmp);
    }

    //11
    int initNumber, resultNumber = 0;
    printf("Init number: ");
    scanf ("%i", &initNumber);
    printf("\n");
    int temp = 0;
    do {
        temp = initNumber % 10;
        initNumber /= 10;
        resultNumber += temp;
    } while (initNumber > 0);
    printf("Sum: %i\n\n", resultNumber);
}