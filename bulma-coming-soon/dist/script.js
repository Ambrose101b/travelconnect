// ♫ ♫ IT'S THE FINAL COUNTDOWN ♫ ♫ //

var endingDate = new Date("Jul 04, 2024 13:37:00").getTime();
var x = setInterval(function() {
	var current = new Date().getTime();
	var remainingTime = endingDate - current;

	var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
	var hours = Math.floor(
		(remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
	);
	var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
	var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

	document.getElementById("countdown").innerHTML =
		days +
		"<span>D</span> " +
		hours +
		"<span>H</span> " +
		minutes +
		"<span>M</span> " +
		seconds +
		"<span>S</span> ";
}, 1000);