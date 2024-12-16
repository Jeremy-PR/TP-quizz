
let timer = 15;
let countdown = setInterval(function () {
    if (timer <= 0) {
        clearInterval(countdown);
       
        document.querySelectorAll('input[type="radio"]').forEach(input => input.disabled = true);
        alert("Temps écoulé ! Vous ne pouvez plus changer vos réponses.");
    } else {
        document.getElementById('timer').innerText = timer;
        timer--;
    }
}, 1000);
