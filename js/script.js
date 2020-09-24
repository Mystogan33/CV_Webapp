$(() => {

	let about = $('#about');

	const scrollListener = (event) => {
		if(window.scrollY <= 450) {
			$('.navbar').css("background-color", "transparent");
			$('.navbar').css("top", "10px");
		} else {
			$('.navbar').css("background-color", "rebeccapurple");
			$('.navbar').css("top", "0");
		}

		about.css("clip-path", `polygon(0 0, 0 100%, 100% ${75 + (window.scrollY/20)}%, 100% 0)`);
	};

	window.addEventListener('scroll', scrollListener);

	console.log("jQuery been loaded...");
	$(".toast").toast("show");
	$("#contact-form").submit((e) => {
		e.preventDefault();
		$(".comments").empty();
		var formData = $("#contact-form").serialize();

		// $.post(
		// 	"php/contact.php",
		// 	formData,
		// 	(result) => {
		// 		if (result.isSuccess) {
		// 			$("#contact-form input, #contact-form textarea")
		// 				.addClass("is-valid")
		// 				.removeClass("is-invalid");
		// 			$("#contact-form").append(
		// 				"<p class='thank-you'>Votre message à bien été envoyé.<br>Merci de m'avoir contacté 😃</p>"
		// 			);
		// 			$("#contact-form")[0].reset();
		// 		} else {
		// 			var selector;
		// 			$("#firstname + .comments").html(result.firstnameError);
		// 			$("input[name='firstname']").addClass(
		// 				result.firstnameError == "" ? "is-valid" : "is-invalid"
		// 			);

		// 			$("#name + .comments").html(result.nameError);
		// 			$("input[name='name']").addClass(
		// 				result.nameError == "" ? "is-valid" : "is-invalid"
		// 			);

		// 			$("#email + .comments").html(result.emailError);
		// 			$("input[name='email']").addClass(
		// 				result.emailError == "" ? "is-valid" : "is-invalid"
		// 			);

		// 			$("#phone + .comments").html(result.phoneError);
		// 			$("input[name='phone']").addClass(
		// 				result.phoneError == "" ? "is-valid" : "is-invalid"
		// 			);

		// 			$("#message + .comments").html(result.messageError);
		// 			$("textarea[name='message']").addClass(
		// 				result.messageError == "" ? "is-valid" : "is-invalid"
		// 			);
		// 		}
		// 	},
		// 	"json"
		// )
		// 	.fail((err) => console.log(err))
		// 	.always(() => console.log("Request sending finished..."));
	});
});
