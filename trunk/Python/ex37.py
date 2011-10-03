# -*- coding:utf-8 -*-
# Filename : ex37.py
# http://s5s5.me
# 抓取豆瓣fm华语频道音乐列表

import os
import urllib
import json
import time


def get_mp3():
    cwd = os.getcwd()
    downdir = cwd+os.sep+'Music_'
    print '\n下载目录为：', downdir, '\n'
    if not os.path.isdir(downdir):
        print '下载目录不存在，正在创建目录：', downdir
        os.mkdir(downdir)

    url = 'http://douban.fm/j/mine/playlist?type=n&channel=1'
    music_json = urllib.urlopen(url)
    base_json = json.load(music_json)
    for i in base_json['song']:
        title = i['title'].encode('utf8')
        artist = i['artist'].encode('utf8')
        song = artist + ' ' + title
        song = song.replace('/', '&')
        mp3 = i['url'].encode('utf8')
        mp3file = downdir + os.sep + song + '.mp3'
        if os.path.isfile(mp3file):
            print '%s.mp3已经存在，转到下一首\n' % song
        else:
            print '\n正在下载歌曲：%s...\n' % song
            cmd = 'wget %s -c -t 3 -O "%s"' % (mp3, downdir + os.sep + song + '.mp3')
            os.system(cmd)
            print '《%s》下载完毕！' % song


def main():
    for i in range(0, 100):   # 抓它100次，因为每条json只有10首歌左右
        get_mp3()
        print i     # 显示一下进度
        time.sleep(1)   # 延时1秒去抓，抓太快会被封IP
    print '抓取豆瓣fm华语频道音乐列表完成'

main()
