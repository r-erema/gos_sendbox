cmake_minimum_required(VERSION 3.10)

find_library(M_LIB m)
add_executable(main main.c)
target_link_libraries(main ${M_LIB})
