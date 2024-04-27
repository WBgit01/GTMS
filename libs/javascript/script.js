// DROP MENU
const toggleBtn = document.querySelector('.toggle_btn')
const toggleBtnIcon = document.querySelector('.toggle_btn i')
const dropMenu = document.querySelector('.drop-menu')

toggleBtn.onclick = function (){
	dropMenu.classList.toggle('open')
	const isOpen = dropMenu.classList.contains('open')

	toggleBtnIcon.classList = isOpen
		?'fa-solid fa-xmark'
		:'fa-solid fa-bars-staggered'
}


// contact js
const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
  
});
