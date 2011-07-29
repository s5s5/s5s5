# -*- coding: utf-8 -*-
# Filename : ex5.py

name = 'Zed A. shaw'
age = 35 # not a lie
height = 74 # inches
weight = 180 # lbs
eyes = 'Blue'
teeth = 'White'
hair = 'Brown'
height2 = height * 2.54
weight2 = weight * 0.45359237

print "Let's talk about %s." % name
print "He's %d inches (%f CM) tall." % (height, height2)
print "He's %d pounds (%f Kg.) heavy." % (weight, weight2)
print "Actually that's not too heavy."
print "He's got %s eyes and %s hair." % (eyes, hair)
print "His teeth are usually %s depending on the coffee." % teeth

# this line is tricky, try to get it exactly right
print "If I add %d, %d, and %d I get %d." % (
    age, height, weight, age + height + weight)
