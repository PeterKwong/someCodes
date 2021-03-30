@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('page.metaTitle1')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('page.metaDescription1')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('page.metaTitle1')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('page.metaDescription1')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('page.metaTitle1')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('page.metaDescription1')}}" /> 
        <meta property="og:site_name" content="{{trans('page.metaTitle1')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 

 

    @endSection

    @section('content')
        <br>

        <div class="row justify-content-center text-left">
            <div class="col-11">
		        <div id="home">
					
					<h2 style="text-align: center;">鑽石淨度特徵的類型</h2>
					<h2 style="text-align: center;"><span style="color: #fff;">鑽石價格表 , 鑽石戒指價格 , 結婚戒指推薦 , 結婚戒指價錢 , 鑽石戒指價錢 , 求婚戒指價錢 , 婚戒推薦</span></h2>
					
		            <div class="row justify-content-center text-center">
		                <div class="col-10">
                            <x-gia-video/>
		                </div>
		            </div>

					<div>鑽石在巨大的熱力及壓力條件下形成，差不多每一粒都擁有外在及內在的特徵，那就是鑽石的淨度特徵。這些特徵都有助於寶石學家，用來分辨人工合成鑽石、模仿品及其他寶石。</div>
					<p>&nbsp;</p>
					<img width="300" height="225" src="/images/front-end/pages/inclusion/Complete-list-of-diamond-inclusion-types-in-GIA-a-plotting-diagram1-300x225.png" class="img-fluid" alt="鑽石淨度特徵的類型" sizes="(max-width: 300px) 100vw, 300px" />
					<div>首先我們會將鑽石的淨度特徵分為二大種類，內含物（Inclusion、紅色）或者外部瑕疵（Blemishes、綠色）</div>
					<div>GIA證書報告會提供一個淨度分佈圖，加上符號用來描述內含物發及外部瑕疵的特性類型，它們的位置及大小。<img width="195" height="300" src="/images/front-end/pages/inclusion/inclusions-plotting-diagram-300x137.png" class="img-fluid" alt="內含物（Inclusion）或者外部瑕疵（Blemishes）"  sizes="(max-width: 195px) 100vw, 195px" />
					<div>我們例出了一些在鑽石裡面，常見的淨度特徵類型：</div>
					<div>晶體（Crystal）</div>
					<div>鑽石內部的一粒壙物結晶體。</div>
					<img class="size-full wp-image-1553" src="/images/front-end/pages/inclusion/Crystal-150x150.jpg" alt="晶體（Crystal） 鑽石內部的一粒壙物結晶體。" width="150" height="150" />
					<div>羽裂紋（Feather）</div>
					<div>
					<p>一個在寶石學中常見的字，用來形容白色羽毛狀外表的鑽石內含物。</p>
					</div>
					
					<p><img class="size-full wp-image-1554" src="/images/front-end/pages/inclusion/Feather-150x150.jpg" alt="羽裂紋（Feather） 一個在寶石學中常見的字，用來形容白色羽毛狀外表的鑽石內含物。" width="150" height="150" /></p>
					
					<p>針點（Pinpoint） 一粒非常非常細小的晶體，就像一點。</p>
					<img class="size-full wp-image-1561" src="/images/front-end/pages/inclusion/Pinpoint1-150x150.jpg" alt="針點（Pinpoint） 一粒非常非常細小的晶體，就像一點。" width="150" height="150" />
					<div>雲狀物（Cloud）</div>
					<div>一群比較集中的針點在鑽石內，它們每一點都可以是十分難分辨的細點，但集中在一起時會有霧氣（Hazy）的外觀。</div>
					<img width="150" height="150" src="/images/front-end/pages/inclusion/Cloud-1-150x150.jpg" class=" attachment-thumbnail" alt="雲狀物（Cloud） 一群比較集中的針點在鑽石內，它們每一點都可以是十分難分辨的細點，但集中在一起時會有霧氣（Hazy）的外觀。" srcset="/images/front-end/pages/inclusion/Cloud-1-150x150.jpg 150w,"/images/front-end/pages/inclusion/Cloud-1-300x300.jpg 300w,"/images/front-end/pages/inclusion/Cloud-1.jpg 500w" sizes="(max-width: 150px) 100vw, 150px" />
					<div>孿晶紋（Twinning Wisp）</div>
					<div>一連串的針點、雲狀物、或是晶體形成大範圍的線狀紋。</div>
					<img class="size-full wp-image-1562" src="/images/front-end/pages/inclusion/Twinning-Wisp-150x150.jpg" alt="孿晶紋（Twinning Wisp） 一連串的針點、雲狀物、或是晶體形成大範圍的線狀紋。" width="150" height="150" />
					<div>針狀物（Needle）</div>
					<div>在鑽石內部一條尖而長的晶體，10倍放大鏡下就像是一條細棒。</div>
					<img class="size-full wp-image-1560" src="/images/front-end/pages/inclusion/Needle-150x150.jpg" alt="針狀物（Needle） 在鑽石內部一條尖而長的晶體，10倍放大鏡下就像是一條細棒。" width="150" height="150" />
					<div>內凹天然面（Indented Natural）</div>
					<div>一部分原石未打磨的表面，伸延至已打磨了的鑽石表面。</div>
					<img class="alignnone size-full wp-image-1556" src="/images/front-end/pages/inclusion/Indented-Natural-150x150.jpg" alt="內凹天然面（Indented Natural） 一部分原石未打磨的表面，伸延至已打磨了的鑽石表面。" width="150" height="150" />
					<div>晶結（Knot）</div>
					<div>一個白色或者是透明的鑽石結晶。</div>
					<img class="alignnone size-full wp-image-1558" src="/images/front-end/pages/inclusion/Knot-150x150.jpg" alt="晶結（Knot） 一個白色或者是透明的鑽石結晶。" width="150" height="150" />
					<div>洞痕（Cavity）</div>
					<div>一個有角度的缺口在鑽石表面，打磨時因羽裂紋裂開，或是伸延到外部的晶體甩掉。</div>
					<img class="alignnone size-full wp-image-1550" src="/images/front-end/pages/inclusion/Cavity-Feather-150x150.jpg" alt=" 洞痕（Cavity） 一個有角度的缺口在鑽石表面，打磨時因羽裂紋裂開，或是伸延到外部的晶體甩掉。" width="150" height="150" />
					<div>中心孿晶紋（Grain Center）</div>
					<div>在鑽石內一個細小，而集中的晶體位置變形；可以是白或者是黑色，或者有一個線狀或針點狀的外觀。</div>
					<p><img class="alignnone size-full wp-image-1555" src="/images/front-end/pages/inclusion/Grain-Center-150x150.jpg" alt=" 中心孿晶紋（Grain Center） 在鑽石內一個細小，而集中的晶體位置變形；可以是白或者是黑色，或者有一個線狀或針點狀的外觀。" width="150" height="150" /></p>
					<div>內部孿晶紋（Internal Graining）</div>
					<div>在10倍放大鏡下，在鑽石內可能是白色、有色或無色而影響折射的線、角或者是曲面；有機會是晶體不規則生長引致。</div>
					<img class="alignnone size-full wp-image-1557" src="/images/front-end/pages/inclusion/Internal-Graining-150x150.jpg" alt="內部孿晶紋（Internal Graining） 在10倍放大鏡下，在鑽石內可能是白色、有色或無色而影響折射的線、角或者是曲面；有機會是晶體不規則生長引致。" width="150" height="150" />
					<div>雷射洞（Laser Drilling-hole）</div>
					<div>在鑽石雷射鑽洞會產生一個達到表面的通道，再漂走黑色的內含物，減低內含物的可見程度。</div>
					<img class="alignnone size-full wp-image-1559" src="/images/front-end/pages/inclusion/Laser-Drill-Hole-150x150.jpg" alt="雷射洞（Laser Drilling-hole） 在鑽石雷射鑽洞會產生一個達到表面的通道，再漂走黑色的內含物，減低內含物的可見程度。" width="150" height="150" />
					<div>缺口（Chip）</div>
					<div>一個空隙可以是因為鑽石表面損耗，通常在鑽石的腰部、切割面的交接或是底尖位置。</div>
					<img class="alignnone size-full wp-image-1551" src="/images/front-end/pages/inclusion/Chip-150x150.jpg" alt="缺口（Chip） 一個空隙可以是因為鑽石表面損耗，通常在鑽石的腰部、切割面的交接或是底尖位置。" width="150" height="150" />
					<p>胡須狀腰部（Bearded Girdle）</p>
					<div>有很多很細小的羽毛狀的內含物在鑽石表面，由表面伸延到內部；大多數原因是在打磨過程中引致的。</div>
					<img class="alignnone size-full wp-image-1549" src="/images/front-end/pages/inclusion/Bearded-Girdle-150x150.jpg" alt=" 胡須狀腰部（Bearded Girdle） 有很多很細小的羽毛狀的內含物在鑽石表面，由表面伸延到內部；大多數原因是在打磨過程中引致的。" width="150" height="150" />
					<div> 翻譯自： <a href="http://4csblog.gia.edu/2013/diamond-inclusions-defined">http://4csblog.gia.edu/2013/diamond-inclusions-defined</a></div>
					</div>
				</div>
		</div>        	
    </div>

        </div>

    @endSection


