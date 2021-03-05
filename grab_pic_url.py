from urllib import request 
from bs4 import BeautifulSoup
from urllib.request import urlretrieve
import re

url = 'http://www.atlanticchef.com/product.php'   #選擇網址
user_agent = 'Mozilla/5.0 (Windows; U; Windows NT 6.1; zh-CN; rv:1.9.2.15) Gecko/20110303 Firefox/3.6.15'  #偽裝
headers = {'User-Agent':user_agent}
data_res = request.Request(url=url,headers=headers)
data = request.urlopen(data_res)
data = data.read().decode('utf-8')
# print(data)
sp = BeautifulSoup(data,features="html.parser")   


compiled_pattern = re.compile('<br>(?P<pro_name>.*)<br/>\d+.*\n.*\n<img class="pic" src="(?P<img_url>.*)"/>') 



# images = sp.findAll('img')
# for image in images:
#     #print image source
#     print(image)
#     print(image['src'])
#     #print alternate text
#     print('\n')

# pro_list=sp.findAll("span",{"class": "info"})
# # for pro in pro_list:
# #     print(pro[0])
# print(pro_list[0])


# ultag = sp.find("ul",{"class":"productslist"})
# li_list=ultag.findAll("li")

divtag= sp.find("div",{"style":"display: none;"})
print(divtag)

# print(sp.select( '[style~="display:none"]' ))

Series_1461= sp.find(id="htab-1")
Series_1201= sp.find(id="htab-2")
Series_8321= sp.find(id="htab-4")

img_1461=Series_1461.find("ul")
img=img_1461.findAll('li')

for knife in img:
    # print(knife)
    result = compiled_pattern.search(str(knife))
    # print(result)

    if result:
        print(result['pro_name']," ",result['img_url'])

# print(result['pro_name']," ",result['img_url'])
# print('kinfe info : %s \n  %d',img[0],len(img))
# result = compiled_pattern.search(str(img[0]))
# print(result['pro_name']," ",result['img_url'])

http://www.atlanticchef.com/uploadfiles/l/202004151800_32772395.png