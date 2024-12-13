document.querySelectorAll('.answer-btn').forEach(button => {
    button.addEventListener('click', function(event) {
        let clickedButton = event.target;
        let isCorrect = clickedButton.value === 'true';


        clickedButton.style.backgroundColor = isCorrect ? 'green' : 'red';
        clickedButton.style.color = 'white';

       
        let question = clickedButton.closest('.question');
        question.querySelectorAll('.answer-btn').forEach(btn => {
            btn.disabled = true;
        });
    });
});
