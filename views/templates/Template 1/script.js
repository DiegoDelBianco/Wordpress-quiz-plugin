    // on load page add class show to first question
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.question').classList.add('show');
    });

    // on chance question next question
    document.querySelectorAll('#quiz-questions .option input').forEach(function(item) {
        item.addEventListener('change', function() {
            var question = this.closest('.question');
            question.classList.remove('show');

            // get question name
            var questionName = this.name;
            var questionNumber = questionName.split('-')[1];

            // check if next question exist
            var nextQuestion = document.querySelector('#question-' + (parseInt(questionNumber) + 1));

            if (nextQuestion) {

                // update process bar
                var processBar = document.querySelector('#quiz-process-bar div');
                processBar.style.width = (parseInt(questionNumber) + 1) * 100 / [questions_count] + '%';
                
                nextQuestion.classList.add('show');
            }else{
                window.location.href = '[final_link]';
            }
        });
    });