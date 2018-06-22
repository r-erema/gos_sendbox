#include <stdio.h>

void main() {
    int i = 1;
    int* pointer = &i;
    int j = *pointer;
    printf("%p\n", pointer);
    printf("%i\n", j);
    char* p = NULL;
}