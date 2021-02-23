
function setLink(class_)
{
	$(`nav ul a`).removeClass("active");
	$(`nav ul a.${class_}`).addClass("active");
}