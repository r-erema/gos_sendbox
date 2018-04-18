cmake_minimum_required(VERSION 3.10)

add_executable(Types Types.c)
find_library(M_LIB m)
target_link_libraries(Types ${M_LIB})
