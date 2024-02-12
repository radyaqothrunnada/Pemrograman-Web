function validateInputs() {
  let nama = document.getElementById("nama").value;
  let email = document.getElementById("email").value;
  let alamat = document.getElementById("alamat").value;
  if (username === " " || Email === "" || Alamat === " ") {
    document
      .getElementById("form")
      .onsubmit(alert("Data yang kamu isi belum semua"));
  }
}
