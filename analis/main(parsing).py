import cloudscraper
import codecs
from bs4 import BeautifulSoup
from xml.etree.ElementTree import ElementTree, Element
from lxml import etree
import xml.etree.ElementTree as ET

root = Element("feed")
headers = {
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.133 Safari/537.36"
}


links = []
fullname = []
title = []
price = []
area = []
priceperm = []
des = []
builder = []
adress = []
godpos = []
repair = []
ownerava = []
img = []
number = []
lat = []
lng = []
rayon = []


def make_csv():
    for i in range(len(links)):
        branch = ET.SubElement(root, "obj")
        ET.SubElement(branch, 'title').text = title[i]
        ET.SubElement(branch, 'builder').text = builder[i]
        ET.SubElement(branch, 'adress').text = adress[i]
        ET.SubElement(branch, 'price').text = price[i]
        ET.SubElement(branch, 'priceperm').text = priceperm[i]
        ET.SubElement(branch, 'area').text = area[i]
        ET.SubElement(branch, 'godpos').text = godpos[i]
        ET.SubElement(branch, 'repair').text = repair[i]
        ET.SubElement(branch, 'des').text = des[i]
        ET.SubElement(branch, 'ownerava').text = ownerava[i]
        ET.SubElement(branch, 'img').text = img[i]
        ET.SubElement(branch, 'number').text = number[i]
        ET.SubElement(branch, 'lat').text = lat[i]
        ET.SubElement(branch, 'lng').text = lng[i]
        ET.SubElement(branch, 'link').text = links[i]
        ET.SubElement(branch, 'rayon').text = rayon[i]
    tree = ET.ElementTree(root)
    tree.write("godpleasesavemysoul.xml", encoding='utf-8')


def result():
    print('title', len(title), title)
    print('builder', len(builder), builder)
    print('link', len(links), links)
    print('adress', len(adress), adress)
    print('price', len(price), price)
    print('priceperm', len(priceperm), priceperm)
    print('area', len(area), area)
    print('godpos', len(godpos), godpos)
    print('descript', len(des), des)
    print('repair', len(repair), repair)
    print('ownerava', len(ownerava), ownerava)
    print('img', len(img), img)
    print('number', len(number), number)
    print('lat', len(lat), lat)
    print('lng', len(lng), lng)
    print('rayon', len(rayon), rayon)


def parse_pages(i):
    session = cloudscraper.create_scraper()
    f = open("out.html", "w", encoding='utf-8')
    r = session.get(url=links[i], timeout=10, headers=headers)
    contents = r.text
    f.write(contents)
    f.close()
    print(len(lat))
    soup = BeautifulSoup(contents, 'lxml')
    title.append(soup.find('h1').text)
    coord = contents[contents.find('"coordinates":{')+15:]
    coord = coord[6:coord.find('}')].replace('"lng":', '')
    at, ng = map(str, coord.split(','))
    lat.append(at)
    lng.append(ng)
    print(at)
    print(ng)
    square = contents[contents.find('"totalArea":"')+13:]
    square = square[:square.find('","')]
    print(square)
    area.append(square)
    desc = contents[:contents.find('","photos":[{')]
    desc = desc[::-1]
    desc = desc[:desc.find('":"noitpircsed"')]
    desc = desc[::-1]
    desc = desc.replace('\\n', ' ').replace('\\', ' ').replace('#iEU58E', '').replace('u002F2', '').replace('#iEuwom', '').replace('u002F', ' ').replace('#IeU6Sm', '').replace(' t', '')
    print(desc)
    des.append(desc)
    otdelka = contents[contents.find('{"title":"Отделка","value":"'):]
    otdelka = otdelka[otdelka.find('"value":"')+9:otdelka.find('"}],"')]
    print(otdelka)
    repair.append(otdelka)
    avatar = contents[contents.find('"absoluteAvatarUrl"')+21:]
    avatar = avatar[:avatar.find('"absoluteMiniAvatarUrl"')-2]
    avatar = codecs.decode(avatar, 'unicode-escape')
    avatar = str(avatar.encode('utf-8'))
    if len(avatar) < 200:
        print(avatar[2:-1])
        ownerava.append(avatar[2:-1])
    else:
        print('-')
        ownerava.append('-')
    contents = contents[contents.find('"photos"'):]
    contents = contents[contents.find('":"')+3:contents.find('</script><script>')]
    contents = codecs.decode(contents, 'unicode-escape')
    contents = str(contents.encode('utf-8'))
    contents = contents[:contents.find('"number"')+20]
    s = ''
    while 'https://' in contents:
        image = contents[contents.find('https://cdn-p.cian.site/images'):contents.find('.jpg')+4]
        if '-1.jpg' in image:
            s = s + image + ','
        contents = contents[contents.find(image)+1:]
    s = s[:-1]
    print(s)
    img.append(s)
    phone = contents[-10:]
    if len(phone) == 11:
        phone = phone.replace('8', '+7', 1)
    else:
        phone = '+7'+phone
    print(phone)
    number.append(phone)
    print('\n')


def main():
    for i in range(100):
        site = str('https://krasnodar.cian.ru/cat.php?deal_type=sale&engine_version=2&offer_type=flat&p=' + str(i+1) + '&region=4820&room1=1&room2=1&room3=1&room4=1&room5=1&room9=1')
        print(site)
        f = open("out.html", "w", encoding='utf-8')
        session = cloudscraper.create_scraper()
        r = session.get(site, timeout=5, headers=headers)
        contents = r.text
        f.write(contents)
        f.close()
        soup = BeautifulSoup(contents, 'lxml')
        for tag in soup.find_all("div", {"data-name": "LinkArea"}):
            if tag.find("a", {"class": "_93444fe79c--link--eoxce"})['href'] in links:
                continue
            print(tag.find("a", {"class": "_93444fe79c--link--eoxce"})['href'])
            links.append(tag.find("a", {"class": "_93444fe79c--link--eoxce"})['href'])
            print(tag.find("span", {"data-mark": "MainPrice"}).text)
            price.append(tag.find("span", {"data-mark": "MainPrice"}).text.replace('\xa0', ' ').replace(' ', '')[:-1])
            print(tag.find("p", {"data-mark": "PriceInfo"}).text)
            priceperm.append(tag.find("p", {"data-mark": "PriceInfo"}).text.replace('\xa0', ' ').replace(' ', '')[:-1])
            if tag.find("a", {"class": "_93444fe79c--jk--dIktL"}) is not None:
                print(tag.find("a", {"class": "_93444fe79c--jk--dIktL"}).text)
                builder.append(tag.find("a", {"class": "_93444fe79c--jk--dIktL"}).text)
            else:
                builder.append('-')
            print(tag.find("div", {"class": "_93444fe79c--labels--L8WyJ"}).text)
            adress.append(tag.find("div", {"class": "_93444fe79c--labels--L8WyJ"}).text)
            ad = tag.find("div", {"class": "_93444fe79c--labels--L8WyJ"}).text
            ra = ad[ad.find(","):]
            ra = ra[ra.find(",")+2:]
            ra = ra[ra.find(",") + 2:]
            ra = ra[:ra.find(", ")]
            print(ra)
            rayon.append(ra)
            if tag.find("span", {"data-mark": "OfferSubtitle"}) is not None:
                if '²' not in tag.find("span", {"data-mark": "OfferSubtitle"}).text:
                    print(tag.find("span", {"data-mark": "OfferSubtitle"}).text)
                    godpos.append(tag.find("span", {"data-mark": "OfferSubtitle"}).text)
                else:
                    print('-')
                    godpos.append('-')
            else:
                print('-')
                godpos.append('-')
    for j in range(len(links)):
        parse_pages(j)
    result()
    make_csv()


if __name__ == '__main__':
    main()