document.addEventListener('DOMContentLoaded', function() {
    const pollForm = document.getElementById('poll-form');
    const pollResults = document.getElementById('poll-results');

    // Objeto para almacenar los resultados de la encuesta
    let pollData = {
        Rick: 0,
        Morty: 0,
        Summer: 0,
        Otros: 0
    };

    // Actualiza los resultados de la encuesta en la página
    function updatePollResults() {
        pollResults.innerHTML = '';
        for (const character in pollData) {
            const resultItem = document.createElement('div');
            resultItem.innerHTML = `${character}: ${pollData[character]} votos`;
            pollResults.appendChild(resultItem);
        }
    }

    // Maneja el envío del formulario de la encuesta
    pollForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const selectedCharacter = pollForm.querySelector('input[name="character"]:checked').value;
        pollData[selectedCharacter]++;
        updatePollResults();
        // Aquí podrías enviar los resultados a un servidor para almacenamiento
    });
});
