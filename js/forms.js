const notifications = document.querySelector(".notifications")
let myhidden = document.querySelector(".hiddeninput")

// Objeto contendo detalhes para diferentes tipos de toast
const toastDetails = {
    timer: 5000,
    success: {
        icon: 'fa-circle-check',
        text: 'Sucesso! As suas mudanças foram salvas',
    },
    error: {
        icon: 'fa-circle-xmark',
        text: 'E-mail ou senha incorretos',
    },
    warning: {
        icon: 'fa-triangle-exclamation',
        text: 'Aviso: e-mail indisponível',
    },
}

const removeToast = (toast) => {
    toast.classList.add("hide");
    if(toast.timeoutId) clearTimeout(toast.timeoutId); // Limpa a contagem da notificação
    setTimeout(() => toast.remove(), 500); // Remove a notificação depois de 500ms
}

const createToast = (id) => {
    // Pega o ícone e o texto da notificação com base no id passado
    const { icon, text } = toastDetails[id];
    const toast = document.createElement("li"); // Cria um novo elemento 'li' para a notificação
    toast.className = `toast ${id}`; // Prepara os nomes das classes da notificação
    // Prepara o inner HTML para a notificação
    toast.innerHTML = `<div class="column">
                         <i class="fa-solid ${icon}"></i>
                         <span>${text}</span>
                      </div>
                      <i class="fa-solid fa-xmark" onclick="removeToast(this.parentElement)"></i>`;
    notifications.appendChild(toast); // Liga a notificação à ul de notificação
    // Prepara uma contagem para remover a notificação depois da duração especificada
    toast.timeoutId = setTimeout(() => removeToast(toast), toastDetails.timer);
}

// Cria uma notificação quando clica no botão
if (myhidden.value !== 'empty') {
    createToast(myhidden.id);
}