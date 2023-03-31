const openguild = document.getElementById('opensettings');
const modalsettings_container = document.getElementById('modalsettings_container');
const closeguild = document.getElementById('closesettings');

openguild.addEventListener('click', () => {
    modalsettings_container.classList.add('show');
});
closeguild.addEventListener('click', () => {
    modalsettings_container.classList.remove('show');
});