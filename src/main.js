

const $ = document.querySelectorAll.bind(document);

$(".focusable, .button").forEach(el => {
	// blur only on mouse click
	// for accessibility, keep focus when keyboard focused
	el.addEventListener("mousedown", e => e.preventDefault());
	el.setAttribute("tabindex", "0");
});

$(".server").forEach(el => {
	el.addEventListener("click", () => {
		const activeServer = $(".server.active")[0];
		activeServer.classList.remove("active");
		activeServer.removeAttribute("aria-selected");

		el.classList.add("active");
		el.setAttribute("aria-selected", true);
	});
})

$(".channel-text").forEach(el => {
	el.addEventListener("click", () => {
		$(".channel-text.active")[0].classList.remove("active");
		el.classList.add("active");
	});
})

// focus/blur on channel header click
$(".channels-header")[0].addEventListener("click", e => {
	e.preventDefault();

	const focused = document.activeElement === e.target;
	focused ? e.target.blur() : e.target.focus();
});


function toggleDiv() {
	var div = document.getElementById('warning-content');
	if (div.classList.contains('warning-active')) {
		div.classList.remove('warning-active');
		div.classList.add('warning-inactive');
	} else {
		div.classList.remove('warning-inactive');
		div.classList.add('warning-active');
	}
}

/*let input = document.querySelector('input'); // get the input element
input.addEventListener('input', resizeInput); // bind the "resizeInput" callback on "input" event
resizeInput.call(input); // immediately call the function*/

document.querySelectorAll('input').forEach(input => {
	input.addEventListener('input', resizeInput);
	resizeInput.call(input);
})

function resizeInput(input) {
	//console.log(this.value)
	//if (this.id == "username") {
	//this.style.minWidth = "63px"
	//this.style.maxWidth = "100px"
	//} else {
	//this.style.minWidth = "100px"
	//}
	//this.style.width = (this.value.length + 0.4) + "ch";
	if (this.value.length <= 3) {
		this.style.width = "3.5ch"; // test
	} else {
		this.style.width = (this.value.length + 0.4) + "ch";
	}
}
//this.style.minwidth = (this.value.length + 1) + "ch";



function scrollToBottom() {
	var messagesContainer = document.getElementById("messages-container");
	messagesContainer.scrollTop = messagesContainer.scrollHeight;
  }
  
  // Faire défiler jusqu'en bas au chargement de la page
  window.onload = function() {
	scrollToBottom();
  }
  
  // Faire défiler jusqu'en bas toutes les 5 secondes
  setInterval(function() {
	scrollToBottom();
  }, 1000);


  