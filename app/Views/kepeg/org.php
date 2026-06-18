<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> - jsFiddle demo</title>
  
  <script type='text/javascript' src='<?= base_url(); ?>jquery.js'></script>
  <link rel="stylesheet" href="<?= base_url(); ?>org/org-chart/demo.css"/>
  <link rel="stylesheet" href="<?= base_url(); ?>org/org-chart/jquery.orgchart.css"/>
  <script src="<?= base_url(); ?>org/org-chart/jquery.js"></script>
   <script type='text/javascript'>
$(function(){
var members;
$.ajax({
	url:'load.php',
	async:false,
	success:function(data){
		members=$.parseJSON(data)
	}
})

		//memberId,parentId,otherInfo
		for(var i = 0; i < members.length; i++){
			
		    var member = members[i];
			
			if(i==0){
				$("#mainContainer").append("<li id="+member.memberId+">"+member.otherInfo+"</li>")
			}else{
				
				if($('#pr_'+member.parentId).length<=0){
				  $('#'+member.parentId).append("<ul id='pr_"+member.parentId+"'><li id="+member.memberId+">"+member.otherInfo+"</li></ul>")
				}
				else{
				  $('#pr_'+member.parentId).append("<li id="+member.memberId+">"+member.otherInfo+"</li>")
			     }
				
			}
		}
					


    
	$("#mainContainer").orgChart({container: $("#main"),interactive: true, fade: true, speed: 'slow'});	
}); 
</script>
</head>
<body>
<div  style="display: none">
<ul id="mainContainer" class="clearfix"></ul>	
</div>
<div id="main">
</div>
</body>
</html>