# -*- coding: utf-8 -*-
# Filename : ex15.py

#引入sys模块的argv功能
from sys import argv

#把角本名和文件名存成参数
script, filename = argv

#打开filename并存为txt变量
txt = open(filename)

#打印文件名
print "Here's your file %r:" % filename
#打印txt，注意要用read()来读取
print txt.read()

#关闭打开的txt
txt.close()

#打印
print "I'll also ask you to type it again:"
#定义输入的文件名为变量
file_again = raw_input("> ")

#打开输入的文件名并存为变量
txt_again = open(file_again)

#打印，注意用read()来读取
print txt_again.read()

#关闭打开的txt_again
txt_again.close()
