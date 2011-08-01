# -*- coding: utf-8 -*-
# Filename : ex9.py

print "I am 6'2\" tall."
print 'I am 6\'2" tall.'

tabby_cat = "\tI'm tabbed in."
persian_cat = "I'm split\non a line."
backslash_cat = "I'm \\ a \\ cat."

fat_cat = '''
I'll do a list:
\t* Cat food
\t* Fishies
\t* Catnip\n\t* Grass
\t* Tabby cat: %s
\t* Persian cat: %r
\t* Backslash cat: %s
''' % (tabby_cat, persian_cat, backslash_cat)

print tabby_cat
print persian_cat
print backslash_cat
print fat_cat
