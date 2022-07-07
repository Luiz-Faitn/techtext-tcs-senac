const searchBar = document.querySelector('.usuarios .search input'),
  searchBtn = document.querySelector('.usuarios .search button');
usersList = document.querySelector('.users-list');

searchBtn.onclick = () => {
  searchBar.classList.toggle('active');
  searchBar.focus();
  searchBtn.classList.toggle('active');
  searchBar.value = '';
};

searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
  if (searchTerm != '') {
    searchBar.classList.add('active');
  } else {
    searchBar.classList.remove('active');
  }
  let xhr = new XMLHttpRequest();
  xhr.open('POST', '../backend/search.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send('searchTerm=' + searchTerm);
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open('GET', '../backend/usuarios.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (!searchBar.classList.contains('active')) {
          usersList.innerHTML = data;
        }
      }
    }
  };
  xhr.send();
}, 500);
