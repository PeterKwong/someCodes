@extends('layouts.section.frontend')

    @section('meta')

        <!-- Place this data between the <head> tags of your website --> 
        <title>{{trans('page.metaTitle2')}} - {{trans('home.webTitle')}}</title>
        <meta name="description" content="{{trans('page.metaDescription2')}}" />

        <!-- Schema.org markup for Google+ --> 
        <meta itemprop="name" content="{{trans('page.metaTitle2')}} - {{trans('home.webTitle')}}"> 
        <meta itemprop="description" content="{{trans('page.metaDescription2')}}""> 
        <meta itemprop="image" content="{{url("/images/front-end/home/h1_300-1.png")}}">

        <!-- Open Graph data --> 
        <meta property="og:title" content="{{trans('page.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="og:url" content="{{url("/")}}" />
        <meta property="og:image" content="{{url("/images/front-end/home/h1_300-1.png")}}" />
        <meta property="og:description" content="{{trans('page.metaDescription2')}}" /> 
        <meta property="og:site_name" content="{{trans('page.metaTitle2')}} - {{trans('home.webTitle')}}" /> 
        <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" /> 
        <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
        <meta property="article:tag" content="{{trans('tag.Diamond')}},{{trans('tag.Diamond Ring')}}" /> 
 
		<script src="//vjs.zencdn.net/5.19/video.min.js" defer></script>

    @endSection

    @section('content')
        <br>
            <div class="row" >
                <div class="col-11 justify-content-center ">
                    <div id="home">
			            
			  		<h1 style="text-align: center;">HOLLOWAY CUT ADVISER</h1>
					<p><span style="color: #330066; font-size: small;">Holloway  Cut Adviser ，HCA（何奴偉切割查詢器）( <a href="http://patft.uspto.gov/netacgi/nph-Parser?Sect1=PTO1&amp;Sect2=HITOFF&amp;d=PALL&amp;p=1&amp;u=%2Fnetahtml%2FPTO%2Fsrchnum.htm&amp;r=1&amp;f=G&amp;l=50&amp;s1=7,251,619.PN.&amp;OS=PN/7,251,619&amp;RS=PN/7,251,619" target="_blank">U.S. Patent 7,251,619</a> ) 估計一個圓形鑽石，基於其潛在的光反射，火，閃爍和直徑大小。</span></p>
					<p>大多數人會想尋找範圍1-2之間的鑽石，其中：0-2優秀，2-4非常好，4-6好，6-8博覽會，和8-10差。零幾乎是不可能的，是因為許多因素各有衝突。</p>
					<p>你需要4個數字。總深度％（Total Depth %），枱面％（Table %）和冠部角度（Crown deg）和亭部角度（Pavilion deg）。從2006年AGS和GIA和IGI報告。迴聲“一些報告列出不準確的樹冠圓形％和Pavilion％的;運行石頭，如果分數在2.0，要求零售商取到您報告與角度。</p>
					<p>HCA沒有對稱（symmetry），拋光（polish）和切割面（minor facets）的資料;只用它來過容濾一些表現比較差的鑽石，縮小您的最終選擇。<a href="http://tingdiamond.com/hk/education-diamond-grading/hearts-and-arrows/"> 八心八箭</a>筒都能有幫助。</p>
					<p>本網站有介紹了更多關於<a href="http://tingdiamond.com/hk/education-diamond-grading/4cs/cut/">切割</a>鑽石的資訊。HCA的詳細說明，請瀏覽  <a href="http://www.diamond-cut.com.au/" target="_blank"><u>www.diamond-cut.com.au</u></a>.</p>
					
					<div class="new_hca_head" style="text-align: left;">
                        <font style="font-weight: 600; color: #000; padding: 0 0px 0 0px!important;font-size: 1.2em; text-align: center;">Trade should visit the business  <a style="font-size: 1em !important;text-decoration: underline;" href="https://www.hollowaycutadviser.com/hcabulk/" target="_blank">&nbsp;HCA page</a>.&nbsp;You have <span style="white-space:nowrap;">3/3</span>&nbsp;HCA results.</font>
                    </div>




                    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->

                    <title> Holloway Cut Adviser </title>

                    <style>
                        #fkbx {
                            border: none;
                            border-radius: 2px;
                            box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
                            height: 44px;
                            outline: none;
                            transition: box-shadow 200ms cubic-bezier(0.4,0.0,0.2,1);
                        }

                        #fkbx {
                            background-color: #fff;
                            border: 1px solid rgb(185,185,185);
                            border-radius: 1px;
                            border-top-color: rgb(160,160,160);
                            display: inline-block;
                            font: 18px arial,sans-serif;
                            height: 36px;
                            line-height: 36px;
                            max-width: 672px;
                            position: relative;
                        }

                            #fkbx input, #fkbx textarea, #fkbx select, #fkbx button {
                                text-rendering: auto;
                                color: initial;
                                letter-spacing: normal;
                                word-spacing: normal;
                                text-transform: none;
                                text-indent: 0px;
                                text-shadow: none;
                                display: inline-block;
                                text-align: start;
                                margin: 0em;
                            }

                            #fkbx > input {
                                background: transparent;
                                border: none;
                                bottom: 0;
                                box-sizing: border-box;
                                left: 0;
                                margin: 0;
                                outline: none;
                                padding: 0 8px;
                                position: absolute;
                                top: 0px;
                                width: 90%;
                                font-weight: inherit;
                            }

                        #fkbx {
                            /*background-color: #fff;
                        border: 1px solid rgb(185,185,185);
                        border-radius: 1px;
                        border-top-color: rgb(160,160,160);
                        cursor: text;
                        display: inline-block;
                        font: 18px arial,sans-serif;
                        height: 36px;
                        line-height: 36px;
                        max-width: 672px;
                        position: relative;*/
                            display: block;
                            width: 100%;
                            height: 22px;
                            padding: 6px 0px;
                            font-size: 14px;
                            line-height: 1.42857143;
                            color: #555;
                            background-color: #fff;
                            background-image: none;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                            -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
                            -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                        }

                        #fkbx_crt {
                            bottom: 12px;
                            left: 13px;
                            top: 12px;
                        }

                        #fkbx_crt {
                            background: #333;
                            bottom: 5px;
                            position: absolute;
                            left: 9px;
                            right: auto;
                            top: 5px;
                            visibility: hidden;
                            width: 1px;
                        }

                        .fkbx-spch, #_Wnb {
                            padding: 22px 12px 0;
                        }

                        .fkbx-spch {
                            cursor: pointer;
                            display: none;
                            height: 21px;
                            padding: 0px 6px 0;
                            width: 17px;
                            background-size: 24px 24px;
                            position: absolute;
                            right: 0;
                        }
                    </style>

                    <div style="position:relative;">
                        <br />
                        <div class="hca_form">
                            <form action='https://www.pricescope.com/tools/hca' method="post" name="hca" id="hca" style="font-size: 1.2em; margin:0px; font-weight: normal;">
                                <table align="center" border="0" cellpadding="4" cellspacing="0"><tbody><tr></tr></tbody></table>
                                <table align="center" border="0" cellpadding="4" cellspacing="0" style="background-color: #ffffff;">
                                    <tbody>
                                        <tr>
                                            <td colspan="3" style="text-align:center;font-weight:bold;">Step 1 - Enter GIA/AGS report number or enter all fields</td>
                                            
                                        </tr>
                                        
                                        <tr id="tr_gia_number">
                                            <td colspan="3">
                                                <div class="" id="fkbx" style="width: 100%;">
                                                    <input class="gia_number_size" id="gia_number" maxlength="20" name="gia_number" placeholder="Enter GIA/AGS report #" size="4" tabindex="1" type="text" value="" />
                                                    <div id="fkbx_crt"></div>
                                                    <div class="fkbx-spch" style="display: block;">
                                                    </div>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        <tr id="tr_size">
                                            <td colspan="3" style="text-align:center; max-width:200px;font-size:14px;display:none;;">
                                                <div id="div_gia_size" style='display:none;'>
                                                    <div style="color:green;">
                                                        <span>We are having trouble finding your data.</span>
                                                        <br />
                                                        <span>Please let us know your Carat size to help us find it</span>
                                                    </div>
                                                    <div class="" id="fkbx" style="width: 100%;">
                                                        <input Value="" class="gia_number_size" data-val="true" data-val-number="The field size must be a number." data-val-required="The size field is required." id="size" maxlength="20" name="size" placeholder="Carat size" size="10" tabindex="2" type="text" value="0" />
                                                        <div id="fkbx_crt"></div>
                                                        <div class="fkbx-spch" style="display: block;">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </td>
                                        </tr>







                                        <tr>
                                            <td id="hca_message" colspan="3" style="text-align: left; padding: 0 5px; font-size: 15px; color: red;">
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="text-align:center;">OR</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: middle;text-align: left;">Carat Size</td>
                                            <td style="vertical-align: middle;text-align: center;">Weight</td>
                                            <td>
                                                <input class="form-control hca_input" data-val="true" data-val-number="The field size_textbox must be a number." data-val-required="The size_textbox field is required." id="size_textbox" maxlength="7" name="size_textbox" placeholder="Enter diamond carat size" size="7" style="min-width: 150px;" tabindex="3" type="text" value="" />
                                                
                                                
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: middle;text-align: left;">Depth</td>
                                            <td style="vertical-align: middle;text-align: center;">%</td>
                                            <td>
                                                <input class="form-control hca_input" data-val="true" data-val-number="The field depth_textbox must be a number." data-val-required="The depth_textbox field is required." id="depth_textbox" maxlength="4" name="depth_textbox" placeholder="Enter diamond depth" size="4" style="min-width: 150px;" tabindex="3" type="text" value="" />
                                                
                                                
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: middle;text-align: left;"><a href="https://www.pricescope.com/wiki/diamonds/diamond-table-size">Table</a></td>
                                            <td style="vertical-align: middle;text-align: center;">%</td>
                                            <td>
                                                <input class="form-control hca_input" data-val="true" data-val-number="The field table_textbox must be a number." data-val-required="The table_textbox field is required." id="table_textbox" maxlength="4" name="table_textbox" placeholder="Enter diamond table" size="4" style="min-width: 150px;" tabindex="4" type="text" value="" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: middle;text-align: left;background-color: #ffffff;"><a href="https://www.pricescope.com/wiki/diamonds/diamond-crown-and-pavilion">Crown</a></td>
                                            <td style="vertical-align: middle;text-align: center;background-color: #ffffff;">Angle</td>
                                            <td style="background-color: #ffffff;">
                                                <input class="form-control hca_input" data-val="true" data-val-number="The field crown_textbox must be a number." data-val-required="The crown_textbox field is required." id="crown_textbox" maxlength="4" name="crown_textbox" placeholder="Enter diamond crown" size="4" style="min-width: 150px;" tabindex="5" type="text" value="" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: middle;text-align: left;background-color: #ffffff;"><a href="https://www.pricescope.com/wiki/diamonds/diamond-crown-and-pavilion">Pavilion</a></td>
                                            <td style="vertical-align: middle;text-align: center;background-color: #ffffff;">Angle</td>
                                            <td style="background-color: #ffffff;">
                                                <input class="form-control hca_input" data-val="true" data-val-number="The field pavilion_textbox must be a number." data-val-required="The pavilion_textbox field is required." id="pavilion_textbox" maxlength="4" name="pavilion_textbox" placeholder="Enter diamond pavilion" size="4" style="min-width: 150px;" tabindex="6" type="text" value="" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: middle;text-align: left;background-color: #ffffff;">Symmetry</td>
                                            <td style="vertical-align: middle;text-align: center;background-color: #ffffff;"></td>
                                            <td style="background-color: #ffffff;">
                                                
                                                <div style="white-space:nowrap;float:left;"><input checked="checked" class="hca_input" data-val="true" data-val-number="The field symmetry must be a number." data-val-required="The symmetry field is required." id="symmetry" name="symmetry" type="radio" value="1" /> <span>AGS Ideal</span>&nbsp;</div>
                                                <div style="white-space:nowrap;float:left;"><input class="hca_input" id="symmetry" name="symmetry" type="radio" value="2" /> <span>Excellent</span>&nbsp;</div>
                                                <div style="white-space:nowrap;float:left;"><input class="hca_input" id="symmetry" name="symmetry" type="radio" value="3" /> <span>VeryGood</span>&nbsp;</div>
                                                <div style="white-space:nowrap;float:left;"><input class="hca_input" id="symmetry" name="symmetry" type="radio" value="4" /> <span>Good</span>&nbsp;</div>
                                                <div style="white-space:nowrap;float:left;"><input class="hca_input" id="symmetry" name="symmetry" type="radio" value="6" /> <span>Fair</span>&nbsp;</div>
                                                <div style="white-space:nowrap;float:left;"><input class="hca_input" id="symmetry" name="symmetry" type="radio" value="7" /> <span>Poor</span></div>
                                            </td>
                                        </tr>
                                        <tr><td colspan="2"></td><td style="text-align:center;font-size: 12px; padding: 0;">size in mm (optional)</td></tr>

                                        <tr>
                                            <td style="vertical-align: middle;text-align: left;background-color: #ffffff;" colspan="2"><span>Measurement</span> <span style="white-space:nowrap;font-size: 14px;">[L.nn x W.nn x D.nn]</span></td>

                                            <td style="background-color: #ffffff; white-space:nowrap;text-align: left;">
                                                
                                                <input class="form-control hca_input" data-val="true" data-val-number="The field measurement_Length must be a number." data-val-required="The measurement_Length field is required." id="measurement_Length" maxlength="5" name="measurement_Length" placeholder="Length" size="5" style="min-width: 40px;width: 29%; display: inline-block;padding: 6px 8px;" tabindex="7" type="text" value="" />
                                                x
                                                <input class="form-control hca_input" data-val="true" data-val-number="The field measurement_Width must be a number." data-val-required="The measurement_Width field is required." id="measurement_Width" maxlength="5" name="measurement_Width" placeholder="Width" size="5" style="min-width: 40px;width:29%;display: inline-block;padding: 6px 8px;" tabindex="8" type="text" value="" />
                                                x
                                                <input class="form-control hca_input" data-val="true" data-val-number="The field measurement_Depth must be a number." data-val-required="The measurement_Depth field is required." id="measurement_Depth" maxlength="5" name="measurement_Depth" placeholder="Depth" size="5" style="min-width: 40px;width: 29%;display: inline-block;padding: 6px 8px;" tabindex="9" type="text" value="" />

                                        </tr>
                                        <tr>
                                            <td colspan="3" style="text-align:center;font-weight:bold;">Step 2 - Verify parameters and final addition</td>
                                            
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: middle;text-align: left;background-color: #ffffff;">H&A</td>
                                            <td style="vertical-align: middle;text-align: center;background-color: #ffffff;"></td>
                                            <td style="background-color: #ffffff;">
                                                <div style="white-space:nowrap;float:left;"><input class="hca_input1" data-val="true" data-val-number="The field h_a must be a number." data-val-required="The h_a field is required." id="h_a" name="h_a" type="radio" value="0" /> <span>Yes</span>&nbsp;&nbsp;&nbsp;</div>
                                                
                                                <div style="white-space:nowrap;float:left;"><input checked="checked" class="hca_input1" id="h_a" name="h_a" type="radio" value="8" /> <span>No</span>&nbsp;</div>
                                                
                                            </td>
                                        </tr>
                                        <input type="hidden" name="reffer_hca" value="">
                                        <tr>
                                            <td colspan="3" align="center" style="background-color: #ffffff;">
                                                <font><input id="btn_hca" style="max-width: 220px;" class="btn btn-primary" tabindex="10" type="submit" value="Go" onclick='if(post_gia_param()) {$(".hca_input").prop("disabled", false); return true;} return false; '></font>
                                                &nbsp;&nbsp;
                                                
                                                <a href="javascript:void(0)" onclick="go_default_par();" style="white-space:nowrap; font-size:15px;color: green; text-decoration: underline;">See sample HCA result</a>
                                                <input data-val="true" data-val-number="The field cert_number_data_source must be a number." data-val-required="The cert_number_data_source field is required." id="cert_number_data_source" name="cert_number_data_source" type="hidden" value="0" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="hca_form_right">
                            <img class="img-fluid" src='https://www.pricescope.com/hca/content/images/scheme.gif'>
                            <br />
                            <!-- /10543413/HCAtool-middle-right -->
                            <div style="text-align:center;">
                                <div class="hca_form_rekl">
                                  
                                    <div id='div-gpt-ad-1530799813750-0' style='height:50px; width:320px; margin: 0px auto;'>
                                        <script>
                                        googletag.cmd.push(function() { googletag.display('div-gpt-ad-1530799813750-0'); });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


					<p>*如果你有底尖％。</p>
					<table border="1" width="100%" cellspacing="2" cellpadding="2">
					<tbody>
					<tr valign="top">
					<td>Carat</td>
					<td>尖</td>
					<td>非常細</td>
					<td>細</td>
					<td>中度</td>
					<td>輕微大</td>
					<td>大</td>
					<td>非常大</td>
					<td>極大</td>
					</tr>
					<tr>
					<td>0 &#8211; 1</td>
					<td>0% &#8211; 0.45%</td>
					<td>0.45% &#8211; 1.15%</td>
					<td>1.15% &#8211; 1.95%</td>
					<td>1.95% &#8211; 3.75%</td>
					<td>3.75% &#8211; 4.455%</td>
					<td>4.455% &#8211; 8.05%</td>
					<td>8.05% &#8211; 12.05%</td>
					<td>12.05% &#8211; 99.05%</td>
					</tr>
					<tr>
					<td>1 &#8211; 5</td>
					<td>0% &#8211; 0.35%</td>
					<td>0.35% &#8211; 1.05%</td>
					<td>1.05% &#8211; 1.75%</td>
					<td>1.75% &#8211; 3.15%</td>
					<td>3.15% &#8211; 3.75%</td>
					<td>3.75% &#8211; 6.65%</td>
					<td>6.65% &#8211; 10.05%</td>
					<td>10.05% &#8211; 99.05%</td>
					</tr>
					</tbody>
					</table>
					</div>
					</div> </div></div></div></div></div><div class="vc_row wpb_row section vc_row-fluid " style=' text-align:left;'><div class=" full_section_inner clearfix"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
					<div class="wpb_text_column wpb_content_element ">
					<div class="wpb_wrapper">
					<div class="content-middle">
					<h2>亭部角度 VS 冠部及亭部％百分比</h2>
					<p>這是最好的輸入冠部和亭部角度，為HCA過那濾麼不太漂亮的鑽石。我們用三角學，從冠部和亭部％的數據計算角度。如果你有他們的角度就最好：</p>
					<ol>
					<li>四捨五入，即13.3％冠部高度經常變成13％或13.5％。</li>
					<li>亭深％時，轉換為亭角常都會低估了由0.15度的亭角</li>
					<li>掃描儀不擅長測量底尖;一個尖底減少亭深％，但並不能改變亭角。</li>
					</ol>
					<p>&nbsp;</p>
					</div>
					</div>
					</div> </div></div></div></div></div><div class="vc_row wpb_row section vc_row-fluid " style=' text-align:left;'><div class=" full_section_inner clearfix"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
					<div class="wpb_video_widget wpb_content_element vc_clearfix   vc_video-aspect-ratio-169 vc_video-el-width-80 vc_video-align-center">
					<div class="wpb_wrapper">
						<video id="example_video_1" class="video-js vjs-default-skin"
			                                  controls preload="auto" 
			                                  poster="/images/front-end/pages/hca/Screen Shot 2017-12-20 at 8.54.34 PM.png"
			                                  data-setup='{"example_option":true, "fluid": true}'>
			                                 <source src="/images/front-end/pages/hca/2017-12-14_bFGAgWJ6aAeICqR9.mp4" type="video/mp4">
					</div>
					</div>
					</div>
					</div></div></div></div></div><div class="vc_row wpb_row section vc_row-fluid " style=' text-align:left;'><div class=" full_section_inner clearfix"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
					<div class="wpb_text_column wpb_content_element ">
					<div class="wpb_wrapper">
					<div class="content-middle">
					<h1 class="forum-title">有時VG會比EX高分，但好難找到"完美切割"～</h1>
					<h1 class="forum-title"><a href="http://www.pricescope.com/forum/rockytalky/gia-excellent-cut-but-5-5-hca-what-gives-t169515.html">GIA Excellent Cut but 5.5 HCA? What gives?</a></h1>
			                  

			        	
			    </div>
                </div>
            </div>
	@endSection


