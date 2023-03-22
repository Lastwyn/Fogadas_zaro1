var modal = document.getElementById('betModal');
var content = document.getElementsByClassName('modal-content')[0];
var modalTitle = document.getElementById("betModalTitle");
var modalopen = false;

window.onclick = function (e) {
  if (modalopen && !content.contains(e.target)) {
    modal.style.display = "none";
  }
}

function openBetModal(team, odd) {
  setTimeout(() => {
  
  modalopen = true;
  modal.style.display = "block";
  modalTitle.innerHTML = team + " (" + odd + ")";

  // Az ablak bezárása
  document.getElementById("closebtn").onclick = function () {
    modal.style.display = "none";
  }

}, "2");  
}