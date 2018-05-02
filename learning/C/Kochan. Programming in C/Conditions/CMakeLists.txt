cmake_minimum_required(VERSION 3.10)

add_executable(Conditions Conditions.c)
find_library(M_LIB m)
target_link_libraries(Conditions ${M_LIB})