#include <stdio.h>
#include <math.h>

float nextMultiple(float i, float j)
{
    return i + j - (int) i % (int) j;
}

void typeHinting()
{
    float floatVar1 = 123.125, floatVar2;
    int integerVar1, integerVar2 = -150;
    char charVar = 'a';

    integerVar1 = floatVar1;
    printf("%f assigned to an int produces %i\n", floatVar1, integerVar1);

    floatVar1 = integerVar2;
    printf ("%i assigned to a float produces %f\n", integerVar2, floatVar1);

    floatVar1 = integerVar2 / 100; // Целочисленное деление.
    printf ("%i divided by 100 produces %f\n", integerVar2, floatVar1);

    floatVar2 = integerVar2 / 100.0; // Деление целого числа на вещественное,
    printf ("%.i divided by 100.0 produces %f\n", integerVar2, floatVar2);

    floatVar2 = (float) integerVar2 / 100; // Оператор явного приведения типов,
    printf ("(float) %i divided by 100 produces %f\n\n", integerVar2, floatVar2) ;
}

float fahrenheit2Celcius(float fahrenheit)
{
    return (fahrenheit - 32) / 1.8;
}

void main()
{
    int integerVar = 100;
    float floatingVar = 331.79;
    double doubleVar = 8.44e+11;
    char charVar = 'W';
    _Bool boolVar = 0;

    printf("integerVar = %i\n", integerVar);
    printf("floatingVar = %f\n", floatingVar);
    printf("doubleVar = %e\n", doubleVar);
    printf("doubleVar = %g\n", doubleVar);
    printf("charVar = %c\n", charVar);
    printf("boolVar = %i\n\n", boolVar);

    //Преобразования типов
    typeHinting();

    //4
    float fahrenheit = 705;
    printf("Fahrenheit %f = %f Celcius\n\n", fahrenheit, fahrenheit2Celcius(fahrenheit));

    //5
    char c, d;
    c = 'd';
    d = c;
    printf("d = %c\n\n", d);

    //6
    double x = 2.55;
    printf("3х^3 - 5х^2 + 6 = %f\n\n", 3 * pow(x, 3) - 5 * pow(x, 2) + 6);

    //7
    printf("(3.31 * 10 - 8 * 2.01 * 10 - 7) / (7.16 * 10 - 6 + 2.01 * 10 - 8) = %e\n\n", (3.31 * 10 - 8 * 2.01 * 10 - 7) / (7.16 * 10 - 6 + 2.01 * 10 - 8));

    //8
    printf("nextMultiple(365, 7): %f\n", nextMultiple(365, 7));
    printf("nextMultiple(12.258, 23): %f\n", nextMultiple(12.258, 23));
    printf("nextMultiple(996, 4): %f\n\n", nextMultiple(996, 4));

}

