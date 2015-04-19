	@extends('host.master')
	@section('title',"$title")
	@section('content')
	<div id="slider_wrapper">
		<div class="wrap">

			<div class="tabs">

			    <div class="tab-content">
			        <div id="tab1" class="tab active">
		        		<span class="tab-price">
		        			<i class="icon-comment-alt"></i>
		        			<span>فقط<em>4.95 ريال سعودي</em>شهريًا</span>
		        		</span>

			            <h1>الإستضافة</h1>
			            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dignissim sodales nisl sed facilisis. Suspendisse tempor, nisl eu sollicitudin feugiat, eros sem porta magna, quis vestibulum lorem urna eu orci. In hac habitasse platea dictumst. In vel diam vitae orci suscipit suscipit eu id neque.</p>
			        	<a href="{{url('')}}" class="tab-button">أطلب الان</a>
			        </div>
			 
			        <div id="tab2" class="tab">
		        		<span class="tab-price">
		        			<i class="icon-comment-alt"></i>
		        			<span>فقط<em>19.95 ريال سعودي</em>شهريًا</span>
		        		</span>

			            <h1>الريسلرات</h1>
			            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dignissim sodales nisl sed facilisis. Suspendisse tempor, nisl eu sollicitudin feugiat, eros sem porta magna, quis vestibulum lorem urna eu orci. In hac habitasse platea dictumst. In vel diam vitae orci suscipit suscipit eu id neque.</p>
			        	<a href="{{url('')}}" class="tab-button">أطلب الان</a>
			        </div>
			 
			        <div id="tab3" class="tab">
		        		<span class="tab-price">
		        			<i class="icon-comment-alt"></i>
		        			<span>فقط<em>24.95 ريال سعودي</em>شهريًا</span>
		        		</span>

			            <h1>سيرفر خاص</h1>
			            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dignissim sodales nisl sed facilisis. Suspendisse tempor, nisl eu sollicitudin feugiat, eros sem porta magna, quis vestibulum lorem urna eu orci. In hac habitasse platea dictumst. In vel diam vitae orci suscipit suscipit eu id neque.</p>
			        	<a href="{{url('')}}" class="tab-button">أطلب الان</a>
			        </div>

			        <div id="tab4" class="tab">
		        		<span class="tab-price">
		        			<i class="icon-comment-alt"></i>
		        			<span>فقط<em>199.95 ريال سعودي</em>شهريًا</span>
		        		</span>

			            <h1>السيرفرات الخاصة</h1>
			            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dignissim sodales nisl sed facilisis. Suspendisse tempor, nisl eu sollicitudin feugiat, eros sem porta magna, quis vestibulum lorem urna eu orci. In hac habitasse platea dictumst. In vel diam vitae orci suscipit suscipit eu id neque.</p>
			        	<a href="{{url('')}}" class="tab-button">أطلب الان</a>
			        </div>
			    </div>

			    <ul class="tab-links">
			        <li class="active"><a href="#tab1"><i class="icon-hdd"></i><span>استضافة مشتركة</span></a></li>
			        <li><a href="#tab2"><i class="icon-hdd"></i><span>ريسلرات</span></a></li>
			        <li><a href="#tab3"><i class="icon-hdd"></i><span>سيرفرات مشتركة</span></a></li>
			        <li><a href="#tab4"><i class="icon-hdd"></i><span>سيرفرات كاملة</span></a></li>
			    </ul>

			</div>

		</div>
	</div>

	<div class="clear"></div>

	<div class="content">
		<div class="wrap">

			<div class="clear"></div>

			<div class="pricing_wrapper">
				<div class="one_fourth">
					<div class="pricing">
						<div class="pricing_top">
							<h4>خطة ابتدائية</h4>
							<p>4.95</p>
							<h4>ريال سعودي</h4>
						</div>

						<ul>
							<li><i class="icon-hdd"> </i><strong>10GB</strong>  مساحة</li>
							<li><i class="icon-dashboard"></i><strong>100GB</strong> باندويث</li>
							<li><i class="icon-envelope"></i><strong>10</strong> بريد الكتروني</li>
							<li><i class="icon-globe"></i><strong>1</strong> نطاق مجاني</li>
							<li class="pricing_order"><a href="{{url('')}}">أطلب الان</a></li>
						</ul>
					</div>
				</div>
				<div class="one_fourth">
					<div class="pricing">
						<div class="pricing_ribbon">
							<p>الأفضل</p>
						</div>
						<div class="pricing_top">
							<h4>خطة شخصية</h4>
							<p>9.95</p>
							<h4>ريال سعودي</h4>
						</div>

						<ul>
							<li><i class="icon-hdd"></i><strong>10GB</strong> مساحة</li>
							<li><i class="icon-dashboard"></i><strong>100GB</strong> باندويث</li>
							<li><i class="icon-envelope"></i><strong>10</strong> بريد الكتروني</li>
							<li><i class="icon-globe"></i><strong>1</strong> نطاق مجاني</li>
							<li class="pricing_order"><a href="{{url('')}}">أطلب الان</a></li>
						</ul>
					</div>
				</div>
				<div class="one_fourth">
					<div class="pricing">
						<div class="pricing_top">
							<h4>خطة متوسطة</h4>
							<p>19.95</p>
							<h4>ريال سعودي</h4>
						</div>

						<ul>
							<li><i class="icon-hdd"></i><strong>10GB</strong> مساحة</li>
							<li><i class="icon-dashboard"></i><strong>100GB</strong> باندويث</li>
							<li><i class="icon-envelope"></i><strong>10</strong> بريد الكتروني</li>
							<li><i class="icon-globe"></i><strong>1</strong> نطاق مجاني</li>
							<li class="pricing_order"><a href="{{url('')}}">أطلب الان</a></li>
						</ul>
					</div>
				</div>
				<div class="one_fourth last">
					<div class="pricing">
						<div class="pricing_top">
							<h4>خطة متقدمة</h4>
							<p>29.95</p>
							<h4>ريال سعودي</h4>
						</div>

						<ul>
							<li><i class="icon-hdd"></i><strong>10GB</strong> مساحة</li>
							<li><i class="icon-dashboard"></i><strong>100GB</strong> باندويث</li>
							<li><i class="icon-envelope"></i><strong>10</strong> بريد الكتروني</li>
							<li><i class="icon-globe"></i><strong>1</strong> نطاق مجاني</li>
							<li class="pricing_order"><a href="{{url('')}}">أطلب الان</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="clear"></div>
			<div class="space"></div>

		</div>

		<div class="stats_wrap">
			<div class="wrap">
				<div class="one_fourth">
					<div class="stats">
						<p><span class="icon-heart"></span></p>
						<h5><span class="count">572</span><br /> عميل راضي</h5>
					</div>
				</div>

				<div class="one_fourth">
					<div class="stats">
						<p><span class="icon-heart"></span></p>
						<h5><span class="count">879</span><br /> موقع مستضاف</h5>
					</div>
				</div>

				<div class="one_fourth">
					<div class="stats">
						<p><span class="icon-heart"></span></p>
						<h5><span class="count">132</span><br /> موظف</h5>
					</div>
				</div>

				<div class="one_fourth last">
					<div class="stats">
						<p><span class="icon-heart"></span></p>
						<h5><span class="count">89</span><br /> السيرفرات الخاصة</h5>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>

		<div class="wrap">

			<div class="clear"></div>
			<div class="space"></div>

			<div class="heading"><span>لماذا <em>تختارنا</em>؟ </span></div>

			<div class="one_third">
				<div class="box_feature">
					<div class="box_feature_icon"><span class="icon-ok"></span></div>
					<div class="box_feature_text">
						<h6>نسخ احتياطية يومية</h6>
						<p>Lorem ipsum dolor amet conse</p>
					</div>
				</div>
			</div>

			<div class="one_third">
				<div class="box_feature">
					<div class="box_feature_icon"><span class="icon-ok"></span></div>
					<div class="box_feature_text">
						<h6>دعم فني على مدار الساعة</h6>
						<p>Lorem ipsum dolor amet conse</p>
					</div>
				</div>
			</div>

			<div class="one_third last">
				<div class="box_feature">
					<div class="box_feature_icon"><span class="icon-ok"></span></div>
					<div class="box_feature_text">
						<h6>سيرفرات قوية و سريعة</h6>
						<p>Lorem ipsum dolor amet conse</p>
					</div>
				</div>
			</div>

					<div class="clear"></div>
					<div class="space2"></div>

			<div class="one_third">
				<div class="box_feature">
					<div class="box_feature_icon"><span class="icon-ok"></span></div>
					<div class="box_feature_text">
						<h6>99.9% ضمان استمرار عمل السيرفرات</h6>
						<p>Lorem ipsum dolor amet conse</p>
					</div>
				</div>
			</div>

			<div class="one_third">
				<div class="box_feature">
					<div class="box_feature_icon"><span class="icon-ok"></span></div>
					<div class="box_feature_text">
						<h6>سيرفرات عالمية</h6>
						<p>Lorem ipsum dolor amet conse</p>
					</div>
				</div>
			</div>

			<div class="one_third last">
				<div class="box_feature">
					<div class="box_feature_icon"><span class="icon-ok"></span></div>
					<div class="box_feature_text">
						<h6>مساحة غير محدودة</h6>
						<p>Lorem ipsum dolor amet conse</p>
					</div>
				</div>
			</div>

				<div class="clear"></div>

		</div>
	</div>
	@stop