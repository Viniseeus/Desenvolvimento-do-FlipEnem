const optionDivs = document.querySelectorAll(".option");

optionDivs.forEach((div) => {
  div.addEventListener("click", () => {
    optionDivs.forEach((div) => {
      div.classList.remove("selected");
    });

    div.classList.add("selected");
  });
});

function formatTime(minutes, seconds) {
  return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
}

const timerElement = document.getElementById("timer");

let minutes = 3; 
let seconds = 0; 

const countdown = setInterval(() => {
  if (minutes === 0 && seconds === 0) {
    clearInterval(countdown);
    alert("Tempo acabou!");
    window.location.href = "index.php";

    fetch("script.php")
      .then(response => response.text())
      .then(result => console.log(result))
      .catch(error => console.log("Erro:", error));
  } else {
    if (seconds === 0) {
      minutes--;
      seconds = 59;
    } else {
      seconds--;
    }

    timerElement.textContent = formatTime(minutes, seconds);
    if (minutes === 0 && seconds === 30) {
    } else if (seconds === 10) {
      timerElement.classList.toggle('timer-red');
    }
  }
}, 1000);

const menuButton = document.getElementById('menuButton');
const menuCard = document.getElementById('menuCard');
const navLinks = document.getElementById('navLinks');

menuButton.addEventListener('click', () => {
  if (window.innerWidth <= 768) {
    menuCard.classList.toggle('active');
  }
});

window.addEventListener('resize', () => {
  if (window.innerWidth > 768) {
    menuCard.classList.remove('active');
  }
});
