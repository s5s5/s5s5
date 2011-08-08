# -*- coding: utf-8 -*-
# Filename : ex16.py

from sys import argv

script, filename = argv

txt = open(filename)
print txt.read()
txt.close()
