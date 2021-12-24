var images = [
	"images/img1.jpg",
	"images/img2.jpg",
	"images/img3.jpg"
];
var i = 0;

function slides() {
	document.getElementById("slide").src = images[i];
	if(i < images.length - 1){
		i++;
	}	
	else
	   i = 0;
}
setInterval(slides,1500)