// document.getElementById("login-button").addEventListener("click", function() {

//     window.location.href = "login";                             
// });

// document.getElementById("register-button").addEventListener("click", function() {

//     window.location.href = "register";                             
// }); 


document.addEventListener('DOMContentLoaded', () => {
  const square1 = document.querySelector('.weather');
  const overlay = document.querySelector('.overlay');
  const closeButton = document.querySelector('.fas.fa-times'); // Dodaj ten element

  square1.addEventListener('click', () => {
    overlay.classList.toggle('active');
    
    // Zmień tło całej strony na ciemne tło
    document.documentElement.style.backgroundColor = 'black';
  });

  closeButton.addEventListener('click', () => {
    overlay.classList.remove('active'); 
    document.documentElement.style.backgroundColor = '';
  });
});


document.getElementById("calendar-click").addEventListener("click", function() {

    window.location.href = "calendar";                             
});

document.getElementById("home").addEventListener("click", function() {
  
  window.location.href = "main";                             
});
