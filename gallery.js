window.onload = function() {
	prepareGallery();
}

function showPic(whichpic) {
	// get the placeholder
	var holder = document.getElementById("placeholder");

	// get the image in the place holder
	var img = holder.children[0];

	// get the 'href' attribute of the link
	// that was was clicked
	var href = whichpic.getAttribute("href");

	// swap
	img.setAttribute("src", href);
}

function prepareGallery() {
	// get the ul holding the link tags
	var ul = document.getElementById("thumbs");

	// get all the links <a> in the ul
	var thumbs = ul.getElementsByTagName("a");

	// loop through all the links and attach an
	// onclick event to them...
	for(var i = 0; i < thumbs.length; ++i) {
		thumbs[i].addEventListener('click', function(e){
			e.preventDefault();
			showPic(this);
		}, false);
	}
}