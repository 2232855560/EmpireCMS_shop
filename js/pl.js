//增加评论
function addPl(){
	var username,saytext,id,classid,enews,repid,url,ecmsfrom;
	username=$("#username").val();
	id=$("#id").val();
	classid=$("#classid").val();
	enews=$("#enews").val();
	repid=$("#repid").val();
	saytext=$("#saytext").val();
	ecmsfrom=$("#ecmsfrom").val();
	if (repid!='0'){
	username=$("#username").val();
	id=$("#replyComment"+repid+" #id").val();
	classid=$("#replyComment"+repid+" #classid").val();
	enews=$("#replyComment"+repid+" #enews").val();
	repid=$("#replyComment"+repid+" #repid").val();
	saytext=$("#replyComment"+repid+" #saytext").val();
	}
	if (saytext==""){
		jError("请说一些你的看法吧!",{HorizontalPosition : 'center',VerticalPosition:'center'});document.getElementById("saytext").focus();return false;
		}
	$.post("/e/pl/ajaxpl.php",
		{
			username:username,
			id:id,
			classid:classid,
			enews:enews,
			repid:repid,
			saytext:saytext
		},
		function(data,status){
			 switch(data){
				  case"FailPassword":jError("请先登陆后再进行评论!",{HorizontalPosition : 'center',VerticalPosition:'center',onClosed : function(){window.location.href="/e/member/login/?from="+ecmsfrom+"#scpinglun";}});
				  break;
				  case"NotCheckedUser":jError("您的帐号还没通过审核!请通过帐号验证后再进行评论!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				  break;
				  case"GuestNotToPl":jError("请先登陆后再进行评论!",{HorizontalPosition : 'center',VerticalPosition:'center',onClosed : function(){window.open("/e/member/login/?from="+ecmsfrom+"#scpinglun");}});
				  break;
				  case"NotLevelToPl":jError("您所在的会员组不能发表评论!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				  break;
				  case"EmptyPl":jError("您没有什么话可说的吗?",{HorizontalPosition : 'center',VerticalPosition:'center'});
				  break;
				  case"ErrorUrl":jError("评论提交异常,请检查来源!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				  break;
				  case"CloseClassPl":jError("此栏目已关闭评论功能!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				  break;
				  case"HavePlCloseWords":jError("有非法字符,无法评论!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				  break;
				  case"CloseInfoPl":jError("此信息已关闭评论!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				  break;
				  case"PlSizeTobig":jError("您的评论内容过长，请精简一下吧!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				  break;
				  case"PlOutTime":jError("您发表评论太快了,请稍后发表!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				  break;
				  case"DbError":jError("网站数据库出错,请联系管理员解决!",{HorizontalPosition : 'center',VerticalPosition:'center'});
				  break;
				  case"AddPlSuccess":jSuccess("评论发表成功,感谢您的参与!",{HorizontalPosition : 'center',VerticalPosition:'center',onClosed : function(){
					  $("#infocommentarea").load("/e/extend/infocomment/index.php?classid="+classid+"&id="+id);
					  $("abbr.plnum").text(parseInt($(".pltab abbr.plnum").text())+1);
					   document.getElementById("saytext").value="";
		  				}
						})
				  break;
				 }
			}
		)
}
//回复评论
function replyComment(plid){
	$("#repid").val(plid);
	//$(".replyComment").slideUp();
	$("#replyComment"+plid).slideToggle();
}
function closepl(plid){
	$("#replyComment"+plid).slideUp();
}
//增加表情
function addface(){
	$(".face").load("/e/extend/face/index.php");
	$(".plsub span .face").toggle()
}