// Formulaire d'inscription
const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;

nextBtnFirst.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});
nextBtnSec.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});
nextBtnThird.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-75%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});
submitBtn.addEventListener("click", function () {
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
  setTimeout(function () {
    alert("Your Form Successfully Signed up");
    location.reload();
  }, 800);
});

prevBtnSec.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnThird.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnFourth.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});



// Fond bleu animé
function setup() {
  for (let i = 0; i < numParticles; i++) {
    particles.push(new Particle());
  }
}

window.addEventListener('mousemove', (e) => {
  mouse.x = e.x;
})

function animate() {
  requestAnimationFrame(animate);
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  particles.forEach((particle, index) => {
    particle.update();
    if (particle.y + particle.radius < 0) {
      setTimeout(() => {
        particles.splice(index, 1);
      }, 0)
      if (!user.login) {
        particles.push(new Particle());
      }
    }
  })
}
setup();
animate();

window.addEventListener('resize', function () {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
})





// Affichage aperçu inscription
var nom = "";

function onNomChange() {
  nom = document.getElementById("nom").value;
  document.getElementById("usernameChange").innerHTML = nom;
}


function onPdpChange() {
  var background = document.getElementById("background").value;
  console.log(background);
  var photoChange = document.getElementById("photoChange");
  // photoChange.style.background = "url('" + background + "') !important";
  // photoChange.style.backgroundSize = "cover";
  document.getElementById("photoChange").innerHTML = '<img class="avatar" src="' + background + '" alt="failed" >';
}
function onPdpChange2(event) {
  var background = URL.createObjectURL(event.target.files[0]);
  console.log(background);
  var photoChange = document.getElementById("photoChange");
  photoChange.innerHTML = '<img class="avatar" src="' + background + '" alt="failed" >';
}



// Random number generation
function insertRandomNumber() {
  var randomNumber = parseInt(Math.random() * (9999 - 1111 + 1) + 1111);
  var randomNumberSpan = document.createElement("span");
  randomNumberSpan.textContent = randomNumber;
  console.log(randomNumber);
  document.getElementById("randomNumber").appendChild(randomNumberSpan);
}