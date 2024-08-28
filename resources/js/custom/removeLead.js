export default function removeLead() {

    const buttons = document.querySelectorAll('.custom-fn-remove');

    async function send(url) {
        let response = await fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        });
    }

    buttons.forEach((item) => {
        item.addEventListener('click', () => {

            let id = item.dataset.itemId;

            if (confirm('Вы подтверждаете удаление?')) {
                send(`${location.origin}/lead/delete/${id}`).then(() => {
                    location.reload();
                });
            }
        });
    });
}
