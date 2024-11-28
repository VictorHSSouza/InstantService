var map = L.map('map').setView([-19.914459057825173, -43.93065654559423], 17);

// Adicionar camada de mapa do OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: ''
}).addTo(map);

// Adicionar marcador (opcional)
L.marker([-19.914459057825173, -43.93065654559423]).addTo(map)
    .bindPopup('Você está aqui!')
    .openPopup();