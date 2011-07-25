#!/usr/bin/python
# -*- coding: utf-8 -*-
# Filename : ex0.py

import os
import sys
import glob

print sys.version

print "显示 /home/penguin/Python/code/ 下所有文件"
print glob.glob("/home/penguin/Python/code/*")

os.mkdir("/home/penguin/Python/code/temp")

print "显示 创建TEMP后"
print glob.glob("/home/penguin/Python/code/*")

os.rmdir("/home/penguin/Python/code/temp")

print "显示 删除TEMP后"
print glob.glob("/home/penguin/Python/code/*")
