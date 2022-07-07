const pswrdField = document.querySelector(".former input[type='password']"),
  toggleIcon = document.querySelector('.former .input-cadastro i');

toggleIcon.onclick = () => {
  if (pswrdField.type === 'password') {
    pswrdField.type = 'text';
    toggleIcon.classList.add('active');
  } else {
    pswrdField.type = 'password';
    toggleIcon.classList.remove('active');
  }
};
