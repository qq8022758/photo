    <!-- ***********************Start container ******************************-->     
    <!-- Start container -->
<div id="container">
	<!-- Side view contains the logo and header section -->
	<div class="sideview">
		<div class="logo">
			<a href="index.php" target="_black"><img src="view/images/logo.png" width="250" height="146" alt="Logo" /></a>
		</div><!-- end logo -->
		<!-- Start menu -->
		<div class="menu">
            <div class="shisuiqiang" id="shisuiqianglink">
               <div><span>梦</span><span class="sui">幻</span><span class="qiang">墙</span></div>
            </div><!-- end shisuiqiang -->
            <div class="personalTab" style="display:none">
               <div class="personalInfo">
                   <div class="Avatar" id="Avatar" dataId="1"></div>
                   <div class="personaltext">
                      <label class="user" id="user"></label>
                      <label class="sex" id="sex"></label>
                   </div><!-- end personaltext-->
                </div><!-- end personalInfo-->
                 <div class="album_photo">
                    <!--<label class="photolink" id="photolink"><span>TotalPhoto</span><span id="photoNum">1000</span></label>-->
                    <label class="albumlink" id="albumlink"><span>TotalAblum</span><span id="albumNum">0</span></label>      <label class="friendlink" id="friendlink"><span>TotalFriend</span><span id="friendNum">0</span></label>
                 </div><!-- end album_photo-->
            </div><!-- end personalTab-->
		</div><!-- end menu -->
        
        <div class="login_and_register" id="login_and_register" >
           <span class="huck"> &nbsp;</span>
           <div class="login_form">
           <div class='inputframe'>
            <input name="email" value="EMAIL" onfocus="if(this.value=='EMAIL'){this.value='';}" onblur="if(this.value=='') {this.value='EMAIL';}" type="email" class="bar email" id="email"/>
       
                <input name="password" value="PASSWORD" onfocus="if(this.value=='PASSWORD') {this.value='';}" onblur="if(this.value=='') {this.value='PASSWORD';}" type="text" class="bar password" id="password" />  
               
           </div>
               
                <label class="not_registed"><span class="first">还没梦幻账号？</span><span class="second">注册NOW</span></label>  
                <label class="admintext" style="display:none">管理员</label>        
                <input type="checkbox"  id="permission" name="checkbox" value="admin" checked="" style="display:none"/>
                <input type="button" class="rc-button" value="登录" id="signIn_btn" />
                <input type="button" class="rc-button" value="注册" id="regist_btn" style=" display:none" />
           </div><!-- end login_form -->
           <div class="out" id="out" style="display:none"><label><span class="userName">userName</span>&nbsp;&nbsp;&nbsp;欢迎您！</label><div class="shezhi"></div><a href="index.php" target="_self" >退出</a></div>
           <ul class="copyright">
              <li>&copy; 2016</li>
              <li>By</li>
              <li>han</li>
		   </ul>
        </div> <!-- end login_and_register -->
        <div class="popframe"><div class="pop"></div></div>
	</div><!-- end sideview -->
       
    <!-- **********************    end sideview   ******************************-->
    
    
    
    
