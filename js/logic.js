function loadModule(module) {
  $(".main_content").html("<button class=\"clear\"><span class=\"ld ld-hourglass ld-spin-fast\" style=\"font-size:16px\"></span> <b>Content is loading...</b></button>");
  $(".main_content").load("./pageController.php?module=" + module);
}

var iaudio = new Audio();

function play(path) {
	$('span._trackname').html(path.split('/')[2].split('.')[1]);
	var pl = $('audio._player');
	$('audio._player').attr('src', path);
	pl.play();/*
	iaudio.src = path;
	iaudio.play();*/
}

function pause() {
	if (!iaudio.paused) iaudio.pause();
	else iaudio.play();
}
