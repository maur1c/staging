document.addEventListener('DOMContentLoaded', () => {
    const charactersEl = document.getElementById('characters');
    const nameFilterEl = document.getElementById('name-filter');
    const statusFilterEl = document.getElementById('status-filter');

    async function getCharacters(name, status) {
        let url = 'https://rickandmortyapi.com/api/character/';

        if (name || status) {
            url += '?';
            if (name) {
                url += `name=${name}&`;
            }

            if (status) {
                url += `status=${status}`;
            }
        }

        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error('Error al cargar los personajes');
            }
            const data = await response.json();
            return data.results;
        } catch (error) {
            console.error('Error:', error);
            return []; // Devolver un array vacío en caso de error
        }
    }

    async function displayCharacters(name, status) {
        try {
            const characters = await getCharacters(name, status);
            charactersEl.innerHTML = '';

            for (let character of characters) {
                const card = document.createElement('div');
                card.classList.add('character-card');

                card.innerHTML = `
                    <img src="${character.image}" />
                    <h2>${character.name}</h2>
                    <p>Status: ${character.status}</p>
                    <p>Especie: ${character.species}</p>
                `;

                charactersEl.appendChild(card);
            }
        } catch (error) {
            console.error('Error al mostrar los personajes:', error);
        }
    }

    // Cargar los personajes al cargar la página
    displayCharacters();

    // Actualizar los personajes cuando cambian los filtros
    nameFilterEl.addEventListener('input', () => {
        displayCharacters(nameFilterEl.value, statusFilterEl.value);
    });

    statusFilterEl.addEventListener('change', () => {
        displayCharacters(nameFilterEl.value, statusFilterEl.value);
    });
});
