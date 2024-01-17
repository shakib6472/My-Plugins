
// <![CDATA[
//CATEGORY Carousel
jQuery(function($) {
console.log('object');
let subjectOwlCarousel = $(".category-carousel .owl-carousel");
function displayActiveSubject() {
$(".tab-pane").removeClass("active");
var currentItem = $(".category-carousel .owl-item.center a").attr(
"tab-content"
);
$("#" + currentItem).addClass("active");
}
subjectOwlCarousel.owlCarousel({
loop: true,
margin: 10,
nav: true,
dots: false,
center: true,
navText: [
"<div class='nav-button owl-prev'>‹</div>",
"<div class='nav-button owl-next'>›</div>",
],
autoWidth: true,
responsive: {
0: {
items: 3,
},
1050: {
items: 5,
},
},
onDragged: displayActiveSubject,
onTranslated: displayActiveSubject,
onInitialized: displayActiveSubject,
});
//Display item on click
$(".owl-item").click(function (e) {
$(".category-carousel .owl-item").removeClass("center");
$(this).toggleClass("center");
displayActiveSubject();
});

// Button - [ Show More / Show Less ]
$(".btn-subject").click(function (e) {
e.preventDefault();
$(this)
.parent()
.find(".subject-hidden")
.each(function () {
$(this).slideToggle("slow");
});
$(this).text().includes("Show More")
? $(this).text("Show Less")
: $(this).text("Show More");
});
});

//Log in db
$(".bottom-banner a").click(function () {
$.tpr.logging.log(window.location.href, "[hh-main-bottom-freetrial]");

});
// ]]>

