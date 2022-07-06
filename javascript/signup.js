const form = document.querySelector('.signup form'),
  continueBtn = form.querySelector('.button input'),
  errorText = form.querySelector('.cadastro__form_item_erro');

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open('POST', '../backend/gravar_Usuario.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === 'Sucesso!' && stristr($data, 'cod') === TRUE) {
          location.href = '../Frontend/listar_usuario.php';
        } else {
          errorText.style.display = 'block';
          errorText.textContent = data;
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};
