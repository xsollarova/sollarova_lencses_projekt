const zakladnaCena = parseFloat(document.getElementById('zakladna-cena').dataset.cena);

const dopravyCeny = {
    'predajna': 0,
    'kurier': 4.5,
};

const platbyCeny = {
    'dobierka': 0.5,
    'karta': 0,
    'prevod': 0,
};

function aktualizujCenu() {
    const doprava = document.querySelector('input[name="shipping"]:checked');
    const platba = document.querySelector('input[name="payment"]:checked');

    const dopravaCena = doprava ? dopravyCeny[doprava.value] : 0;
    const platbaCena = platba ? platbyCeny[platba.value] : 0;

    document.getElementById('doprava-cena').textContent = dopravaCena.toFixed(2).replace('.', ',') + ' €';

    const platbaSummary = document.getElementById('platba-summary');
    if (platbaCena > 0) {
        platbaSummary.style.display = 'flex';
        document.getElementById('platba-cena').textContent = platbaCena.toFixed(2).replace('.', ',') + ' €';
    } else {
        platbaSummary.style.display = 'none';
    }

    const total = zakladnaCena + dopravaCena + platbaCena;
    document.getElementById('total-cena').textContent = total.toFixed(2).replace('.', ',') + ' €';
    aktualizujTlacidlo();
}

function aktualizujTlacidlo() {
    const continueBtn = document.getElementById('continue-btn');
    if (!continueBtn) return;

    const doprava = document.querySelector('input[name="shipping"]:checked');
    const platba = document.querySelector('input[name="payment"]:checked');
    continueBtn.disabled = !(doprava && platba);
}

document.querySelectorAll('input[name="shipping"]').forEach(r => r.addEventListener('change', aktualizujCenu));
document.querySelectorAll('input[name="payment"]').forEach(r => r.addEventListener('change', aktualizujCenu));
    
aktualizujCenu();