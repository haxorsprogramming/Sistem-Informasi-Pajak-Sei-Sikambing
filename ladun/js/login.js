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
      document.querySelector("#divCapForgotPassword").innerHTML = 'Sudah punya akun? silahkan <a href="auth.html">Login</a>';
      document.querySelector("#txt_nisn_reg").focus();
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
      console.log(obj);
    });
  }
}

function daftarProses() {
  let nisn = document.querySelector("#txt_nisn_reg").value;
  let password = document.querySelector("#txt_password_reg").value;
  let ds = { 'nisn':nisn, 'password':password };
  $('#div_status_pendaftaran').hide();
  $('#div_btn_daftar').show();
  if(nisn === '' || password === ''){
    window.alert("Harap isi data kamu ..");
  }else{
    
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
