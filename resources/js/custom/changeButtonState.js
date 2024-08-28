export default function changeButtonState() {

    let fields = document.querySelectorAll('.custom-st-change-state');
    let button = document.querySelector('.custom-st-button');

    fields.forEach((item) => {
        item.addEventListener('input', () => {
            button.removeAttribute('disabled');
        });
    });
}
