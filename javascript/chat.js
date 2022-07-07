const form_chat = document.querySelector('.typing-area'),
  inputField = form_chat.querySelector('.input-field'),
  sendBtn = form_chat.querySelector('button');
chatBox = document.querySelector('.chat-box');

form_chat.onsubmit = (e) => {
  e.preventDefault();
};

inputField.focus();
inputField.onkeyup = () => {
  if (inputField.value != '') {
    sendBtn.classList.add('active');
  } else {
    sendBtn.classList.remove('active');
  }
};

sendBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open('POST', '../backend/insert-chat.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputField.value = '';
        scrollToBottom();
      }
    }
  };
  let formData = new FormData(form_chat);
  xhr.send(formData);
};

chatBox.onmouseenter = () => {
  chatBox.classList.add('active');
};

chatBox.onmouseleave = () => {
  chatBox.classList.remove('active');
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open('POST', '../backend/get-chat.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains(' active')) {
          scrollToBottom();
        }
      }
    }
  };
  let formData = new FormData(form_chat);
  xhr.send(formData);
}, 500);

let formData = new FormData(form_chat);
xhr.send(formData);

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
