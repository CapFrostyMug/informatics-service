export default function changeLeadStatus() {

    let selectTags = document.querySelectorAll('.custom-fn-status-select');

    selectTags.forEach((item) => {
        item.addEventListener("change", () => {

            let leadId = item.dataset.leadId;
            let statusId = item.value;

            (
                async () => {
                    const response = await fetch('lists-and-statistics/change-lead-status', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({
                            lead_id: leadId,
                            status_id: statusId,
                        })
                    });

                    let result = await response;

                    if (result.status === 200) {
                        alert('Статус лида успешно обновлён')
                    } else {
                        alert('Системная ошибка: не удалось изменить статус лида. Попробуйте еще раз.')
                    }
                }
            )();
        })
    });
}
