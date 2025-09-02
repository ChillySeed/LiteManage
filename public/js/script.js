function showContent(id) {
  const pages = document.querySelectorAll('.page');
  const buttons = document.querySelectorAll('.nav-buttons button');

  pages.forEach(page => page.classList.remove('active'));
  buttons.forEach(button => button.classList.remove('active'));

  document.getElementById(id).classList.add('active');
  
  const clickedButton = Array.from(buttons).find(btn => 
    btn.textContent.toLowerCase() === id
  );

  if (clickedButton) {
    clickedButton.classList.add('active');
  }
}
