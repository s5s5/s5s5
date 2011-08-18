# -*- coding: utf-8 -*-
# Filename: ex20.py

#调用sys的argv，使之能用参数
from sys import argv

#定义两个参数
script, input_file = argv

#函数，打印读出的文件

def print_all(f):
    print f.read()

#函数，返回文件最始位

def rewind(f):
    f.seek(0)

#函数，打印文件的一行

def print_a_line(line_count, f):
    print line_count, f.readline()

#打开文件
current_file = open(input_file)

print "First let's print the whole file:\n"

#使用函数打印文件全文
print_all(current_file)

print "Now let's rewind, kind of like a tape."

#使用函数返回文件头
rewind(current_file)

print "Let's print three lines:"

#使用函数搞三次lineprint，同时学一下变量的变化
currnet_line = 1
print_a_line(currnet_line, current_file)

currnet_line = currnet_line + 1
print_a_line(currnet_line, current_file)

currnet_line = currnet_line + 1
print_a_line(currnet_line, current_file)
