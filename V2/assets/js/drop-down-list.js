$(function(){
    const menu = document.getElementById('drop');
    function openMenu() {
      this.classList.toggle('active');
    }
    menu.onclick = openMenu;
})


