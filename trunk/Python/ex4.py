#!/usr/bin/python
# -*- coding: utf-8 -*-
# Filename: ex4.py

#定义车的数量
cars = 100
#定义每辆车的座位
space_in_a_car = 4.0
#定义司机数量
drivers = 30
#定义乘客数量
passengers = 90
#计算空车数量
cars_not_driven = cars - drivers
#计算可开车数量
cars_driven = drivers
#计算总可运送乘客数量
carpool_capacity = cars_driven * space_in_a_car
#计算平均每辆车乘客数量
average_passengers_per_car = passengers / cars_driven

print "There are", cars, "cars available."
print "There are only", drivers, "drivers available."
print "There will be", cars_not_driven, "empty cars today."
print "We can transport", carpool_capacity, "people today."
print "We have", passengers, "to carpool today."
print "We need to put about", average_passengers_per_car, "in each car."
