// Obtém todas as divs de opções
const optionDivs = document.querySelectorAll(".option");

// Adiciona um evento de clique a cada div de opção
optionDivs.forEach((div) => {
  div.addEventListener("click", () => {
    // Remove a classe 'selected' de todas as divs de opção
    optionDivs.forEach((div) => {
      div.classList.remove("selected");
    });
    
    // Adiciona a classe 'selected' à div clicada
    div.classList.add("selected");
  });
});

    // Função para formatar o tempo como MM:SS
    function formatTime(minutes, seconds) {
      return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }
    
    // Obtém o elemento do relógio
    const timerElement = document.getElementById("timer");
    
    let minutes = 10;
    let seconds = 0;
    
    // Atualiza o relógio a cada segundo
    const countdown = setInterval(() => {
      if (minutes === 0 && seconds === 0) {
        clearInterval(countdown);
        alert("Tempo acabou!");
        window.location.href = "index.php";

        // Chama o arquivo PHP para atualizar o banco de dados
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
        // Verifica se faltam 15 segundos e emite um alerta
        if (minutes === 0 && seconds === 30) {
        }  else if (secondsRemaining === 10) {
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

    