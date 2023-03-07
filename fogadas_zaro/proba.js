
function openBetModal(team, odd) {
    var modal = document.getElementById("betModal");
    var modalTitle = document.getElementById("betModalTitle");
    modal.style.display = "block";
    modalTitle.innerHTML = team + " (" + odd + ")";
  }

  // Az ablak bezárása
  var closeBtn = document.getElementsByClassName("close");

  console.log(closeBtn);
  closeBtn.onClick = function() {
    var modal = document.getElementById("betModal");
    modal.style.display = "none";
  }
  

  // Ha a felhasználó kattint a modalon kívülre, akkor az ablak bezárása
  window.onClick = function() {
    var modal = document.getElementById("betModal");
    
      modal.style.display = "none";
      console.log("aaaaaaaa");
    
  }