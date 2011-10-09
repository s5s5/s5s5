# -*- coding:utf-8 -*-
# Filename : ex38.py
# http://s5s5.me
# 抓取豆瓣fm华语频道音乐列表

import os
import urllib2
import json
import time


def get_music_json():
    # 抓取json并写入临时txt
    url = 'http://douban.fm/j/mine/playlist?type=n&h=&channel=1&from=mainsite&r=a17847251d'   # 定义json地址
    music_json = urllib2.urlopen(url)    # urllib去抓json回来
    base_json = json.load(music_json)   # json把json解析
    output = open('tempfje_-83838399wfjefie.txt', 'a')  # 增量写入txt
    for i in base_json['song']:     # 找到json中的相关元素
        title = i['title'].encode('utf8')   # 写入txt用utf8码
        artist = i['artist'].encode('utf8')
        output.write(('%s\t%s' % (artist, title)) + '\n')   # 一行一首歌的写
    output.close()  # 关了文件


def no_repeat():
    # 对临时txt去重并排序
    read_txt = file('tempfje_-83838399wfjefie.txt', 'r')    # 读临时txt
    write_txt = file('欧美.txt', 'w')   # 要写入的txt
    s = set()   # 用set去重
    for i in read_txt:  # 把txt写到set过的变量中
        s.add(i)
    s = list(s)     # 先转成列表才能排序
    s.sort()        # 排序
    for i in s:     # 写入txt
        i = i.replace('/', '&')     # 替换/为&
        write_txt.write(i)
    os.remove('tempfje_-83838399wfjefie.txt')   # 删除临时txt


def main():
    for i in range(0, 1000):   # 抓它100次，因为每条json只有10首歌左右
        get_music_json()
        print i     # 显示一下进度
        time.sleep(2)   # 延时1秒去抓，抓太快会被封IP
    no_repeat()     # 去重排序
    print '抓取豆瓣fm华语频道音乐列表完成'

main()
