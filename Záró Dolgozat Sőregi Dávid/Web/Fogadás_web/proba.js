var modal = document.getElementById('betModal');
var content = document.getElementsByClassName('modal-content')[0];
var modalTitle = document.getElementById("betModalTitle");
var modalopen = false;

window.onclick = function (e) {
  if (modalopen && !content.contains(e.target)) {
    modal.style.display = "none";
  }
}

function openBetModal(team, odd, value2) {
  setTimeout(() => {
  
  modalopen = true;
  modal.style.display = "block";
  modalTitle.innerHTML = team + " ("+ odd + "x" +")";
  document.getElementById("fid").value = value2;
  document.getElementById("odd").value = odd;
  console.log(odd);
  // Az ablak bezárása
  document.getElementById("closebtn").onclick = function (event) {
    modal.style.display = "none";
    event.preventDefault();
  }

}, "2"); 

}