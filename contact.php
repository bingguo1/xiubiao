<!DOCTYPE html>
<html>

<?php
include 'header.php';
?>

<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
<script type="text/javascript" src="js/baidu.js"></script>

<script type="text/javascript">

  ///// https://developers.google.com/maps/documentation/javascript/adding-a-google-map#key
  // Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: -25.344, lng: 131.036 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("googleMap"), {
    zoom: 4,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}


  
   function validateForm(){

   	$("#nameerror").hide();
   	$("#emailerror").hide();
   	$("#messageerror").hide();

   	var emailregex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   	var name=$.trim($("#name").val());
   	var email=$.trim($("#email").val());
   	var phone=$.trim($("#phone").val());
   	var message=$.trim($("#message").val());
   	var err=3;
   	if(name=="") {
   		$("#nameerror").html("姓名不能为空！");
   		$("#nameerror").fadeIn();
   	}
   	else err--;
   	if(email=="") {
   		$("#emailerror").html("邮箱不能为空！");
   		$("#emailerror").fadeIn();
   	}
   	else if(!emailregex.test(email)) {
   		$("#emailerror").html("邮箱格式不正确！");
   		$("#emailerror").fadeIn();
   	}
   	else err--;
   	if(message=="") {
   		$("#messageerror").html("留言不能为空！");
   		$("#messageerror").fadeIn();
   	}
   	else err--;
   	if(err==0){
		    $.ajax({    //create an ajax request to load_page.php
		    	async: false,
		    	global: false,
		    	data: {name:name, email:email,phone:phone,message:message},
		    	type: "POST",
		    	url: "sendemail.php",
		    	success: function(response){
			    //		    		$("#buttonform").hide();
		    		$("#success").hide();
		    		$("#success").html(response);
		    		$("#success").fadeIn(3000);
		    	}
		    });   // ajax

		}

    }  //validate

    $(document).ready(function(){
    	$("#baidumap").hide();
	$("#googleMap").show();

	    initMap();//创建和初始化地图
	    $("#mysubmit").click(function(){
	    	validateForm();
	    });

	    $("#usegoogle").click(function(){
	    	$("#baidumap").hide();
	    	$("#googleMap").show();

	    });

	    $("#usebaidu").click(function(){
	    	$("#googleMap").hide();
	    	$("#baidumap").show();


	    });

	});


</script>

<div class="container">

	<div class="row">
		<div class="box">

			<div class="col-lg-12">
				<hr>
				<h2 class="intro-text text-center">
					<strong>店面地址 & 联系方式</strong>
				</h2>
				<hr>
			</div>
			<div class="col-md-8">
				<button id="usebaidu" class="btn btn-success">百度地图</button>  <button id="usegoogle" class="btn btn-success">谷歌地图</button> <br>

				<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
				<div style="width:100%;height:500px;border:#ccc solid 1px;" id="googleMap"></div>				
				<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjG_NeRHRu4-M8m3JpKB9OBw-FKH7f5VQ&callback=initMap"></script>

				<br>
				<div style="width:100%;height:500px;border:#ccc solid 1px;" id="baidumap"></div>


			</div>

			<div class="col-md-4">
				<p>电话:
					<strong>13933135155</strong>
				</p>
				<p>邮箱:
					<strong><a href="mailto:907229687@qq.com">907229687@qq.com</a></strong>
				</p>
				<p>地址:
					<strong>石家庄市中山东路188号，
						<br>北国商城一楼瑞士梅花表专柜一楼西侧 </strong>
					</p>
					<!-- JiaThis Button BEGIN -->
					<div class="jiathis_style_32x32">
						<a class="jiathis_button_qzone"></a>
						<a class="jiathis_button_tsina"></a>
						<a class="jiathis_button_tqq"></a>
						<a class="jiathis_button_weixin"></a>
						<a class="jiathis_button_renren"></a>
						<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
						<a class="jiathis_counter_style"></a>
					</div>
					<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
					<!-- JiaThis Button END -->



				</div>

				<div class="clearfix"></div>
			</div>
		</div>

		<div class="row">
			<div class="box">
				<div class="col-lg-12" id="buttonform">
					<hr>
					<h2 class="intro-text text-center"> 意见
						<strong>反馈</strong>
					</h2>
					<hr>
					<p>我们真诚地希望您能留下一切宝贵意见和建议：</p>

					<form  action="" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="form-group col-lg-4">
								<label for="name" >姓名:</label><span  style="display:inline-block; width:300px;text-align:right;" id="nameerror"></span>
								<input name="name" type="text" value="" class="form-control" id="name"d>
							</div>

							<div class="form-group col-lg-4">
								<label for="email">邮箱:</label><span  style="display:inline-block; width:300px;text-align:right;" id="emailerror"></span>
								<input name="email" type="email" value="" class="form-control" id="email">
							</div>

							<div class="form-group col-lg-4">
								<label for="phone">电话:</label><span  style="display:inline-block; width:300px;text-align:right;" id="phoneerror"></span>
								<input name="phone" type="number" value="" class="form-control" id="phone">
							</div>
							<div class="form-group col-lg-12">
								<label for="message">留言:</label><span  style="display:inline-block; width:300px;text-align:right;" id="messageerror"></span>
								<textarea name="message" rows="7" class="form-control" id="message"></textarea>
							</div>
						</div>

					</form>
					<button id="mysubmit"> 发送邮件 </button>
				</div>
				<div id="success"></div>
			</div>
		</div> <!-- row -->


	</div>
	<!-- /.container -->



	<?php
	include 'footer.php';
	?>


</body>

</html>
