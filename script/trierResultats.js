document.getElementById('trier').addEventListener('click', function() {
    afficherTri();
});

function afficherTri() {
    var apparaitreDiv = document.querySelector('.hidden');
    apparaitreDiv.classList.remove('hidden');
}