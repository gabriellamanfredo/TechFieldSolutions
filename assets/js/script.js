let nome = document.getElementById("nome");
let email = document.querySelector("#email");
let mensagem = document.querySelector("#mensagem");
let nomeOk = false;
let emailOk = false;
let mensagemOk = false;

nome.style.width = "100%";
email.style.width = "100%";
mensagem.style.width = "100%";

function validaNome() {
  let txt = document.querySelector("#txtNome");
  if (nome.value.length < 3) {
    txt.innerHTML = "Nome inválido!";
    txt.style.color = "red";
  } else {
    txt.innerHTML = "Nome válido!";
    txt.style.color = "green";
    nomeOk = true;
  }
}

function validaEmail() {
  let txt = document.querySelector("#txtEmail");
  if (email.value.indexOf("@") == -1 || email.value.indexOf(".") == -1) {
    txt.innerHTML = "Email inválido!";
    txt.style.color = "red";
  } else {
    txt.innerHTML = "Nome válido!";
    txt.style.color = "green";
    emailOk = true;
  }
}

function validaMensagem() {
  let txt = document.querySelector("#txtMensagem");
  if (mensagem.value.length >= 100) {
    txt.innerHTML = "Digite no máximo 100 caracteres.";
    txt.style.color = "red";
    txtMensagem.style.display = "block";
  } else {
    txtMensagem.style.display = "none";
    mensagemOk = true;
  }
}

function enviar() {
  if (nomeOk == true && emailOk == true && mensagemOk == true) {
    alert("Formulário enviado com sucesso!");
  } else {
    alert("Preencha o formulário corretamente.");
  }
}

$(document).ready(function () {
  // Carrega os comentários quando a página carrega
  loadComments();

  // Quando o formulário é enviado
  $('#comment-form').submit(function (e) {
    e.preventDefault();

    // Pega os dados do formulário
    var name = $('#name').val();
    var message = $('#message').val();

    // Envia os dados para o arquivo PHP
    $.post('comentarios.php', { name: name, message: message }, function () {
      // Após enviar, recarrega os comentários
      loadComments();
      // Limpa os campos do formulário
      $('#name').val('');
      $('#message').val('');
    });
  });
});

// Função para carregar os comentários
function loadComments() {
  $.getJSON('comentarios.php', function (data) {
    // Limpa a div de comentários
    $('#comments').empty();

    // Adiciona cada comentário à div
    $.each(data, function (index, comment) {
      $('#comments').append('<p><strong>' + comment.name + ':</strong> ' + comment.message + '</p>');
    });
  });
}
