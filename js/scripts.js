! function (a) {
	"use strict";
	a('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
		if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
			var t = a(this.hash);
			if ((t = t.length ? t : a("[name=" + this.hash.slice(1) + "]")).length) return a("html, body").animate({
				scrollTop: t.offset().top - 70
			}, 1e3, "easeInOutExpo"), !1
		}
	}), a(".js-scroll-trigger").click(function () {
		a(".navbar-collapse").collapse("hide")
	}), a("body").scrollspy({
		target: "#mainNav",
		offset: 100
	});
	var t = function () {
		a("#mainNav").offset().top > 100 ? a("#mainNav").addClass("navbar-shrink") : a("#mainNav").removeClass("navbar-shrink")
	};
	t(), a(window).scroll(t)
}(jQuery), $(document).on("click", "#sendMailBtn", function (a) {
	a.preventDefault();
	var t = $("#sendMailBtn");
	t.button("loading"), $.ajax({
		url: "ajax.php",
		method: "post",
		dataType: "json",
		data: {
			data: JSON.stringify($("#emailForm").serializeObject())
		},
		success: function (a) {
			t.button("reset"), $("input,textarea").val(""), showSuccessMessage()
		},
		error: function (a) {
			t.button("reset"), 400 === a.status || 403 === a.status || 500 === a.status ? showWarningMessage(a.responseJSON.message) : showWarningMessage()
		}
	})
});