# -*- coding:utf-8 -*-

def xyz1():
    '''
        解不定方程
        x+y+z=100
        5*x+3*y+z/3=100
        x,y,z都是整数并且大于0
    '''
    #方程可以化简成7*x+4*y=100
    for x in range(1, 100 / 5):
        y1 = (100 - 7 * x)
        y = int(y1 / 4)
        if y * 4 == y1 and y >= 0:
            print [x, y, 100 - x - y]
    return


def xyz2():
    for x in range(1, 100 / 5):
        for y in range(1, 100 / 3):
            for z in range(1, 100 * 3):
                z1 = z / 3
                z = int(z1 * 3)

                if 5 * x + 3 * y + z / 3 == 100 and x + y + z == 100:

                    print x, y, z
    return

print xyz1()
print xyz2()
