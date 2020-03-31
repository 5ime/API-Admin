$(function(){
	setInterval("time()", 1000);
	getMsg();
	fitcube();
});

window.onresize = function () {fitcube();}

function fitcube(){
	var el = $('.el span').width();
	$('.el span').css('height',el+'px');
}
function getMsg(){
	var slogan = [
		"希望能成为有趣的人",
		"给时光以生命<br>给岁月以文明",
		"你好，请多指教",
		"当你在凝视着网页的时候<br>网页也正在凝视着你",
		"苟……",
		"ご注文はねこですか？",
		"平凡的日常正奇迹的发生着",
		"Lata<br>lulila<br>lulula<br>lulalila ♪♫",
		"ただの人間には<br>興味ありません！",
		"さあ、ゲームを始めよう",
		"搞事！搞事！搞事！",
		"敬畏之心！",
		"赞美之心！",
		"我很好奇！"
	];
	var r = random(0,slogan.length-1);
	$("#slogan").html(slogan[r])
}
function random(Min,Max){
      var Range = Max - Min;
      var Rand = Math.random();
      var num = Min + Math.round(Rand * Range);
      return num;
}
function time() {
	var time = '#' + (new Date()).toTimeString().match(/\d{2}:\d{2}:\d{2}/)[0].replace(/:/g, '');
	$('.time').text(time);
	$('.background').css('background-color', time);
};