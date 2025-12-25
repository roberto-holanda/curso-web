"use strict";

function createFooter() {
    const contentDiv = document.querySelector('.content');
    if (!contentDiv) return;

    const footer = document.createElement('footer');
    footer.className = 'footer-content';
    
    const paragraph = document.createElement('p');
    paragraph.innerHTML = `Copyright &copy; - ${new Date().getFullYear()}`;
    
    footer.appendChild(paragraph);
    contentDiv.appendChild(footer);
}

async function fetchDateTime() {
    try {
        const response = await fetch('api.php');
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Erro ao consumir API:', error);
        return null;
    }
}

async function updateDateTime() {
    const data = await fetchDateTime();
    // Interrompe a execução se a API não retornar dados
    if (!data) return;
    
    const dateTimeElement = document.getElementById('date-time');
    const locationElement = document.getElementById('location');
    
    if (dateTimeElement) dateTimeElement.textContent = `${data.dia} - ${data.hora}`;
    if (locationElement) locationElement.textContent = `${data.cidade}, ${data.pais}`;
}

function createDateTimeDisplay() {
    const contentDiv = document.querySelector('.content');
    if (!contentDiv) return;

    const dateTimeDiv = document.createElement('div');
    dateTimeDiv.className = 'date-time-container';
    
    const locationElement = document.createElement('p');
    locationElement.id = 'location';
    locationElement.className = 'location-info';
    locationElement.textContent = 'Carregando...';
    
    const dateTimeElement = document.createElement('p');
    dateTimeElement.id = 'date-time';
    dateTimeElement.textContent = 'Carregando...';
    
    dateTimeDiv.appendChild(locationElement);
    dateTimeDiv.appendChild(dateTimeElement);
    contentDiv.appendChild(dateTimeDiv);
    
    updateDateTime();
    // Atualiza data, hora e localização a cada segundo
    setInterval(updateDateTime, 1000);
}

function init() {
    const run = () => {
        createFooter();
        createDateTimeDisplay();
    };
    
    // Aguarda o DOM carregar se ainda estiver carregando, senão executa imediatamente
    document.readyState === 'loading' 
        ? document.addEventListener('DOMContentLoaded', run)
        : run();
}
init();