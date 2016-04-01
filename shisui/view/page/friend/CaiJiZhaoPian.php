
    <div id="tab_CaiJiXiangCe"  class="tab_box">
          <div class="headBox headClass">
            <label>采集照片</label>
            <div class="closepop" id="closepop"></div>
           </div>
   
          <form name="CaiJiXiangCe_form">
              
              <div class="XiangCeMingBox">
                  <label for="XiangCeMing" class="XiangCeMingText">采集到 现有相册:</label>
                  <select id="XiangCeMing">
                     <option value="male">数据库读出的相册名</option> 
                  </select>              
              </div>
              
              
                        
              <div class="XinJianXiangCeBox">               
                  <label for="XinJianXiangCe" class="XinJianXiangCeText">或&nbsp;&nbsp;新建相册:</label>
                  <input type="text" id="XinJianXiangCe" value=""/>
              </div>
              
             

              <div class="buttonBox">
                  <button name="cancle" type="button" id="cancle">取消</button>
                  <button name="modify" type="button" id="submitAlbum">确定</button>
              </div>
          </form>
    </div>
<script type="text/javascript">
$(document).ready(function(e) {
	$(".closepop").click(function(){
		$(".pop").empty();
		$(".popframe").hide();
		}
	); 
	
	
	
});

</script>