/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */

// import './bootstrap.js';
import './styles/app.scss';
import '@fortawesome/fontawesome-free/css/all.min.css';
import '@fortawesome/fontawesome-free/js/all.js';

// BURGER
const burger = document.getElementById('burger');
const navMenu = document.querySelector('.nav_menu');

burger.addEventListener('click', () => {
  navMenu.classList.toggle('active');
});

// COPIER L'EMAIL
document.addEventListener("DOMContentLoaded", function () {
    const copyEmail = document.getElementById('copyEmail');

    copyEmail.addEventListener('click', function (e) {
        e.preventDefault();
        const email = this.getAttribute('data-email');

        // navigator.clipboard.writeText(email).then(() => {
            alert("Email copié : " + email);    
        // }).catch(err => {
        //     console.error("Échec de la copie :", err);
        // });
    });
});