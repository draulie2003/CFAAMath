$(document).ready(init);

function init() {
	/* ========== DRAWING THE PATH AND INITIATING THE PLUGIN ============= */

	$.fn.scrollPath("getPath")
		// Move to 'start' element
		.moveTo(400, 50, {name: "start"})
		// Line to 'info' element
		.lineTo(400, 800, {name: "info"})
		// Arc down and line to 'geometry'
		.arc(200, 1200, 400, -Math.PI/2, Math.PI/2, true)
		.lineTo(600, 1600, {
			name: "geometry"
		})
		// Continue line to 'precal'
		.lineTo(2000, 1600, {
			name: "precal"
		})
		// Draw line to 'mcr'
		.lineTo(3400, 2100,	{
			name: "mcr"
		})
		// Arc down to 'download'
		.arc(3400, 2600, 500, -Math.PI/2, Math.PI/2, false, {rotate: -Math.PI*2, name: "download"})
		// Short line down
		.lineTo(3400, 3200)
		// Continue upwards to 'schedule'
		.lineTo(3000, 400, {
			name: "schedule"
		})
		// Line to 'tutor'
		.lineTo(1700, 0, {
			name: "tutor"
		})
		// Line to 'contact'
		.lineTo(1300, -850, {
			name: "contact"
		})
		// Arc and rotate back to the beginning.
		.arc(1300, 50, 900, -Math.PI/2, -Math.PI, true, {rotate: Math.PI*2, name: "end"});

	// We're done with the path, let's initate the plugin on our wrapper element
	$(".wrapper").scrollPath({drawPath: true, wrapAround: true});

	// Add scrollTo on click on the navigation anchors
	$("nav").find("a").each(function() {
		var target = $(this).attr("href").replace("#", "");
		$(this).click(function(e) {
			e.preventDefault();
			
			// Include the jQuery easing plugin (http://gsgd.co.uk/sandbox/jquery/easing/)
			// for extra easing functions like the one below
			$.fn.scrollPath("scrollTo", target, 1000, "easeInOutSine");
		});
	});

	/* ===================================================================== */

	$(".settings .show-path").click(function(e) {
		e.preventDefault();
		$(".sp-canvas").toggle();
	}).toggle(function() {
		$(this).text("Hide Path");
	}, function() {
		$(this).text("Show Path");
	});

	$(".tweet").click(function(e) {
		open(this.href, "", "width=550, height=450");
		e.preventDefault();
	});

	$.getJSON("http://cdn.api.twitter.com/1/urls/count.json?callback=?&url=http%3A%2F%2Fjoelb.me%2Fscrollpath",
			function(data) {
				if(data && data.count !== undefined) {
					$(".follow .count").html("the " + ordinal(data.count + 1) + " kind person to");
				}
			});
	} 


function highlight(element) {
	if(!element.hasClass("highlight")) {
		element.addClass("highlight");
		setTimeout(function() { element.removeClass("highlight"); }, 2000);
	}
}
function ordinal(num) {
	return num + (
		(num % 10 == 1 && num % 100 != 11) ? 'st' :
		(num % 10 == 2 && num % 100 != 12) ? 'nd' :
		(num % 10 == 3 && num % 100 != 13) ? 'rd' : 'th'
	);
}