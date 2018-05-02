cmake_minimum_required(VERSION 3.10)

add_executable(Cycles Cycles.c)
find_library(M_LIB m)
target_link_libraries(Cycles ${M_LIB})