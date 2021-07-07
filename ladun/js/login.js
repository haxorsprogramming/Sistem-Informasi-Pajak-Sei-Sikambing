// route
var rToLogin = server + "api/login-proses.php";
var rToRegister = server + "api/daftar-proses.php";

// vue object
var app = new Vue({
  el: "#app",
  data: {},
  methods: {
    masukAtc: function () {
      login();
    },
    daftarAtc: function () {
      $("#divFormLogin").hide();
      $("#divBtnDaftar").hide();
      $("#divFormDaftar").show();
      document.querySelector("#txt_username_reg").focus();
    },
    daftarProsesAtc: function () {
      daftarProses();
    },
  },
});

// inisialisasi
document.querySelector("#txt_username").focus();

function login() {
  let username = document.querySelector("#txt_username").value;
  let password = document.querySelector("#txt_password").value;
  let ds = { 'username': username, 'password': password };
  if (username === "" || password === "") {
    ziTo("warning", "Fill field!!!", "Harap lengkapi field yang ada ...");
  } else {
    $.post(rToLogin, ds, function(data){
      let obj = JSON.parse(data);
      let status = obj.status;
      if(status === 'sukses'){
        localStorage.setItem("username", username);
        window.alert("Login berhasil ...");
        window.location.assign("seller-app/main.php");
      }else{
        ziTo("warning", "Error Login!!!", "Username & password salah !!! ...");
      }
    });
  }
}

function daftarProses() {
  let username = document.querySelector("#txt_username_reg").value;
  let password = document.querySelector("#txt_password_reg").value;
  let ds = { 'username': username, 'password': password };
  $('#div_status_pendaftaran').hide();
  $('#div_btn_daftar').show();
  if(username === '' || password === ''){
    ziTo("warning", "Fill field!!!", "Harap lengkapi field yang ada ...");
  }else{
    $.post(rToRegister, ds, function(data){
      let obj = JSON.parse(data);
      let status = obj.status;
      if(status === 'sukses'){
        
        window.alert("Registrasi user berhasil, silahkan login ...");
        window.location.assign("auth.php");
      }else{
        ziTo("warning", "User exist!!!", "Username telah digunakan !!! ...");
      }
    });
  } 
  
}

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}

function ziTo(tipe, judul, message) {
  if (tipe === "info") {
  } else if (tipe === "success") {
  } else if (tipe === "warning") {
    iziToast.error({
      title: judul,
      message: message,
      position: "bottomCenter",
      timeout: 1000,
      pauseOnHover: false,
      onClosed: function () {},
    });
  } else if (tipe === "error") {
    iziToast.error({
      title: judul,
      message: message,
      position: "bottomCenter",
      timeout: 1000,
      pauseOnHover: false,
      onClosed: function () {},
    });
  }
}
