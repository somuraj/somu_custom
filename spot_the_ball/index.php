<html>
<head>
<style>
ul.available_balls {
    list-style: none;
	padding:0;
}
ul.available_balls li {
    display: inline-block;
    padding: 10px;
}
ul.available_balls li:hover {
    background: #e94559 !important;
    cursor: pointer;
}
.logo strong {
    background: #000;
    padding: 1px;
    left: 12px;
    top: -16px;
    z-index: 2;
    position: absolute;
    border-radius: 15px;
    width: 14px;
    color: #fff;
    text-align: center;
}
</style>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
</head>
<body>
<div class="position">Spot the ball - <span class="psso"></span></div><br/><br/>
<div >
  <div>
	<div>
	<ul class="available_balls">
	</ul>
	</div>	
    <div>
      <a id="test">
		<img class="demo-box" src="football.png" />
      </a>
    </div>
  </div>
  <span class="logo"><img src="mouseball.png" alt="Football"></span>
</div>

<script>
$(function() {
var football={};
football.count = 5;
football.spotted = 0;
localStorage.setItem( 'football',  JSON.stringify(football) );
var football_obj = localStorage.getItem('football');
var myJSONObject = JSON.parse(football_obj);

/*for (var key in myJSONObject){
    console.log(myJSONObject[key]+'----'+key);
}*/
var available_balls = myJSONObject.count;
$('.available_balls').html(	
    function(){
        var content=''; 
        for (var i=1; i<=available_balls; i++  ){
            content=content+'<li id="available_ball_'+i+'" data-stselect="off" data-ticketno="'+i+'"><img src="mouseball.png" alt="Football_'+i+'"></li>';
        }
        return content;
    }
)

$('[id^="available_ball_"]').on("click", function(event,ui) {
    var id_name = $(this).attr('id');
    var ticketno = $(this).attr('data-ticketno');
	if($(this).is('[data-stselect="off"]'))
	{
	$(this).parent().find('li').css('background', 'none').attr('data-stselect','off');
	$(this).css('background', '#f21832').attr('data-stselect','on');
	$('.logo').append('<strong>'+ticketno+'</strong>');
	}
	else
	{
	$(this).css('background', 'none').attr('data-stselect','off');
	}
    /*$('[id^="available_ball_"]').each(function(){
        name = name+$('#name_'+$(this).attr('id').split('_')[1]).val();
    });*/
$("#test").mousemove(function(e) {
    $('.logo').offset({
        left: e.pageX-18,
        top: e.pageY-15 
    });
  var offset = $(this).offset();
  var relativeX = (e.pageX - offset.left);
  var relativeY = (e.pageY - offset.top);
  
  $(".psso").html(relativeX+':'+relativeY);	
});    
});

});
/*
$("#test").mousemove(function(e) {
    $('.logo').offset({
        left: e.pageX-18,
        top: e.pageY-15 
    });
  var offset = $(this).offset();
  var relativeX = (e.pageX - offset.left);
  var relativeY = (e.pageY - offset.top);
  
  $(".psso").html(relativeX+':'+relativeY);	
});
*/
</script>
</body>
</html>