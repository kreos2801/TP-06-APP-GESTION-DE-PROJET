// Modifiez votre fichier assets/app.js pour s'assurer que Bootstrap est bien importé
import './bootstrap.js';
import 'bootstrap/dist/css/bootstrap.min.css';
// S'assurer que Bootstrap est importé avec tous ses plugins JS
import * as bootstrap from 'bootstrap';

// Rendre bootstrap disponible globalement si nécessaire
window.bootstrap = bootstrap;

import './styles/app.css';

document.addEventListener('DOMContentLoaded', () => {
    // Initialiser tous les dropdowns
    const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
    dropdownElementList.forEach(dropdownToggleEl => {
        new bootstrap.Dropdown(dropdownToggleEl);
    });
});