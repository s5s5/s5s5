# -*- coding: utf-8 -*-
# Filename : ex7.py

#打印 第二行有字符串替换
print "Mary had a little lamb."
print "Its fleece was white as %s." % 'snow'
print "And everywhere that Mary went."
#打印时可以用 * 代表次数
print "." * 10 # What'd that do?

#定义了一堆的变量
end1 = "C"
end2 = "h"
end3 = "e"
end4 = "e"
end5 = "s"
end6 = "e"
end7 = "B"
end8 = "u"
end9 = "r"
end10 = "g"
end11 = "e"
end12 = "r"

#打印合并后的变量
# watch that coma at the end. try removing it to see what happens
print end1 + end2 + end3 + end4 + end5 + end6,
#逗号在一行显示
print end7 + end8 + end9 + end10 + end11 + end12
