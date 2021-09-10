function showModal() {
    document.querySelector(".modal-form").style.display = "flex";
}

function deletar(idFuncionario) {
    let confirmacao = confirm("Deseja deletar o funcionário?");

    if (confirmacao) {
        window.location = "acaoDeletar.php?id=" + idFuncionario;
    }
}

document.getElementById("buttonAdcFuncionario").addEventListener("click", showModal);