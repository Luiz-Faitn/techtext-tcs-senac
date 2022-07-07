const form = document.querySelector('.login form'),
  continueBtn = form.querySelector('.button input'),
  errorText = form.querySelector('.texto-erro');

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open('POST', '../backend/login.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === 'Sucesso!') {
          location.href = '../Frontend/usuarios.php';
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
