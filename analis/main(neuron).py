import random
import math
import utm
import numpy as np
import matplotlib.pyplot as plt
import xml.etree.ElementTree as ET

from matplotlib.pyplot import (figure)
from numpy import (linspace, meshgrid, sqrt, sin)
from mpl_toolkits.mplot3d import Axes3D
from xml.etree.ElementTree import Element




name = ['OZ MALL', 'КубГУ', 'КубГТУ', 'Вокзал "Краснодар-1"', 'Сквер Жукова (Начало Красной)', '"Галерея" (Середина Красной)', 'Аврора (Конец Красной)', 'Красная Площадь']
prlat = [45.01, 45.02, 45.048, 45.01, 45.03, 45.0319, 45.0509, 45.103]
prlng = [39.12, 39.03, 39.00, 38.98, 38.97, 38.978, 38.979, 38.981]
pts = [150, 250, 200, 100, 300, 450, 350, 200]




FIRST = 8
LAST = 2
MIDDLE = 6

title = []
builder = []
price = []
pricem = []
area = []
repair = []
lat = []
lng = []
godpos = []
link = []
adress = []
priceperm = []
rayon = []
des = []
ownerava = []
img = []
number = []

ppm = []
gip = []
pairs = []
placerate = []


root = Element("feed")


def make_csv():
    for i in range(len(link)):
        branch = ET.SubElement(root, "obj")
        ET.SubElement(branch, 'title').text = title[i]
        ET.SubElement(branch, 'builder').text = builder[i]
        ET.SubElement(branch, 'adress').text = adress[i]
        ET.SubElement(branch, 'price').text = str(price[i])
        ET.SubElement(branch, 'priceperm').text = priceperm[i]
        ET.SubElement(branch, 'area').text = str(area[i])
        ET.SubElement(branch, 'godpos').text = str(godpos[i])
        ET.SubElement(branch, 'repair').text = repair[i]
        ET.SubElement(branch, 'des').text = des[i]
        ET.SubElement(branch, 'ownerava').text = ownerava[i]
        ET.SubElement(branch, 'img').text = img[i]
        ET.SubElement(branch, 'number').text = number[i]
        ET.SubElement(branch, 'lat').text = str(lat[i])
        ET.SubElement(branch, 'lng').text = str(lng[i])
        ET.SubElement(branch, 'link').text = link[i]
        ET.SubElement(branch, 'rayon').text = rayon[i]
        ET.SubElement(branch, 'pairs').text = str(pairs[i])
        ET.SubElement(branch, 'placerate').text = str(placerate[i])
    tree = ET.ElementTree(root)
    tree.write("GODPLEASEFUCKINGDIE.xml", encoding='utf-8')


def rate_place():
    med = sum(pairs)/len(pairs)
    for i in range(len(link)):
        placerate.append(pairs[i] / med)



def show_data():
    data = {'a': lat,
            'b': pricem,
            'c': lng,
            'd': area,
            'e': pairs,
            'aa': prlat,
            'cc': prlng,
            's': pts}

    plt.figure(figsize=(8, 6), dpi=120)
    plt.axis('equal')
    plt.scatter('c', 'a', s='b', data=data, alpha=0.25)
    plt.scatter('cc', 'aa', s='s', data=data, alpha=0.5)
    plt.xlabel('X')
    plt.ylabel('Y')
    plt.show()


def sort_all():
    x = zip(title, price, area, lat, lng, ppm, gip, pairs)
    xs = sorted(x, key=lambda tup: tup[7])
    for i in range(len(xs)):
        print(i, xs[i])


def show():
    for i in range(len(link)):
        print(title[i], price[i], area[i], lat[i], lng[i], ppm[i], gip[i], pairs[i], godpos[i])


def get_closest_pairs(e):
    for i in range(len(link)):
        s = 0
        for j in range(len(link)):
            xdif = abs(lat[i] - lat[j])
            ydif = abs(lng[i] - lng[j])
            xdif *= math.cos(lat[i])
            gipdif = math.sqrt(xdif ** 2 + ydif ** 2)
            if gipdif < e and j != i:
                s += 1
        pairs.append(s)


def get_closest(n):
    xmin = 999
    ymin = 999
    gipmin = 999
    imin = -1
    for i in range(len(link)):
        xdif = abs(lat[i]-lat[n])*111.32
        ydif = abs(lng[i]-lng[n]) / 360
        xdif *= math.cos(lat[i])
        gipdif = math.sqrt(xdif**2 + ydif**2)
        if gipdif < gipmin and n != i and gipdif != 0:
            xmin = lat[i]
            ymin = lng[i]
            gipmin = gipdif
            imin = i
    print(n, 'Расстояние: ', gipmin)
    gip.append(gipmin)


def sorting(aa, bb, cc):
    a = aa
    b = bb
    c = cc

    x = zip(a, b, c)
    xs = sorted(x, key=lambda tup: tup[0])
    for i in range(len(xs)):
        print(i, xs[i])


def get_add_data():
    for i in range(len(title)):
        print(round(int(price[i])/float(area[i])))
        ppm.append(round(int(price[i])/float(area[i])))


def get_data():
    tree = ET.parse('godpleasesavemysoul.xml')
    root = tree.getroot()
    for branch in root:
        for leaf in branch:
            if leaf.tag == 'title':
                title.append(leaf.text[0])
            if leaf.tag == 'price':
                if leaf.text == 'С':
                    price.append(int(0.8))
                    pricem.append(int(800000))
                else:
                    price.append(int(leaf.text))
                    pricem.append(int(leaf.text)/1000000)
            if leaf.tag == 'area':
                area.append(float(leaf.text))
            if leaf.tag == 'builder':
                builder.append(leaf.text)
            if leaf.tag == 'priceperm':
                priceperm.append(leaf.text)
            if leaf.tag == 'adress':
                adress.append(leaf.text)
            if leaf.tag == 'ownerava':
                ownerava.append(leaf.text)
            if leaf.tag == 'rayon':
                rayon.append(leaf.text)
            if leaf.tag == 'img':
                img.append(leaf.text)
            if leaf.tag == 'number':
                number.append(leaf.text)
            if leaf.tag == 'link':
                link.append(leaf.text)
            if leaf.tag == 'des':
                des.append(leaf.text)
            if leaf.tag == 'repair':
                repair.append(leaf.text)
            if leaf.tag == 'lat':
                lat.append(float(leaf.text))
            if leaf.tag == 'lng':
                lng.append(float(leaf.text))
            if leaf.tag == 'godpos':
                if leaf.text[-1] == 'н':
                    godpos.append(0)
                elif leaf.text[-1].isdigit():
                    godpos.append(leaf.text[-4:])
                else:
                    godpos.append(-1)


def main():
    get_data()
    get_add_data()
    sorting(ppm, area, link)
    for n in range(len(link)):
        get_closest(n)
    gipavrg = np.mean(gip)*2
    get_closest_pairs(gipavrg)
    rate_place()
    sort_all()
    show()
    show_data()
    make_csv()


if __name__ == '__main__':
    main()
