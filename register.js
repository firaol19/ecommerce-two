function validateForm() {
    let pasword1 = document.getElementById("pasword1")
    let pasword2 = document.getElementById("pasword2")
    if (pasword1 === pasword2) {
        return true;
    }else{
        alert("not same")
    }
  }