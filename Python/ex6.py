# -*- coding: utf-8 -*-
# Filename : ex6.py

#定义变量x的字符串，同时字符串里的数字是10
x = "There are %d types of people." % 10
#定义变量binary
binary = "binary"
#定义变量do_not
do_not = "dont't"
#定义变量y，y变量调用binary和do_not变量的值
y = "Those who know %s and those who %s." % (binary, do_not)

#打印x
print x
#打印y
print y

#打印字符串并调用x
print "I said: %r." % x
#打印字符串并调用y
print "I also said: '%s'." % y

#定义变量为布尔值：假
hilarious = False
#定义变量，注意：%r把布尔值打出来
joke_evaluation = "Isn't that joke so funny?! %r"

#打印调用变量hilarious的变量joke_evaluation
print joke_evaluation % hilarious

#定义w
w = "This is the left side of..."
#定义e
e = "a string with a right side."

#同时打印两个字符串
print w + e
