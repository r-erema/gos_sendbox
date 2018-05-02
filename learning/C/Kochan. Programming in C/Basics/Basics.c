#include <stdio.h>

void main()
{
    //1
    printf("1. В языке С все символы нижнего регистра значимы.\n"
           "2. Слово main указывает на начало выполнения программы.\n"
           "3. Открывающая и закрывающая фигурные скобки содержат утверждения\n"
           "программы.\n"
           "4. Все утверждения программы должны заканчиваться точкой с запятой.\n\n");
    //3
    int number1 = 87, number2 = 15, result = number1 - number2;
    printf("%i - %i = %i\n\n", number1, number2, result);

    //4
    int sum;
    sum = 25 + 37 - 19;
    printf ("The answer is %i\n", sum);

}