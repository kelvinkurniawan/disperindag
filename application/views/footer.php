	</body>
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
var Tawk_API = Tawk_API || {},
  Tawk_LoadStart = new Date();
(function() {
  var s1 = document.createElement("script"),
    s0 = document.getElementsByTagName("script")[0];
  s1.async = true;
  s1.src = 'https://embed.tawk.to/62bef9967b967b1179978a78/1g6svtuu1';
  s1.charset = 'UTF-8';
  s1.setAttribute('crossorigin', '*');
  s0.parentNode.insertBefore(s1, s0);
})();
	</script>
	<!--End of Tawk.to Script-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
	  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
	  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
const base_url = "https://disperindag-api.kelvinkurniawan.works/api";
const pure_url = "<?=base_url()?>";
const login_state = `<?=$this->session->user ?? ''?>`
let selectedExhItem = false;
let exhData = [];
let exhIndex = 0;

const generateImageUrl = (url) => {
  const result = url.split("id=");
  const drive_url = "https://lh3.googleusercontent.com/d/";
  return drive_url + result[1];
};

const doLogin = () => {
  const data = {
    email: $(".login-email").val(),
    password: $(".login-password").val()
  }
  $.ajax({
    method: "POST",
    url: "<?=base_url()?>auth/login",
    data: data,
    success: function(res) {
      window.location.reload();
    },
    error: function(err) {
      Swal.fire({
        title: "Gagal",
        text: "Username atau password tidak ditemukan",
        type: "error",
      })
    }
  })
}

const goExplore = () => {
  
  if (login_state === '') {
    $("#loginModal").modal("show");
    return;
  }

  const url = `<?=base_url()?>/page/exhibitor`;
  window.open(url, "_blank");
}

const doRegister = () => {
  const data = {
    firstname: $(".register-firstname").val(),
    lastname: $(".register-lastname").val(),
    email: $(".register-email").val(),
    password: $(".register-password").val(),
    occupation: $(".register-occupation").val(),
    organization: $(".register-organization").val(),
    mobile: $(".register-mobile").val(),
    city: $(".register-city").val()
  }

  $.ajax({
    method: "POST",
    url: "<?=base_url()?>auth/register",
    data: data,
    success: function(res) {
      Swal.fire({
        title: "Sukses",
        text: "Anda berhasil mendaftar, silahkan login.",
        type: "success",
      })
      // window.location.reload();
    },
    error: function(err) {
      Swal.fire({
        title: "Gagal",
        text: "Email sudah terdaftar!",
        type: "error",
      })
    }
  })
}

const fireLoginModal = () => {
  $("#registerModal").modal("hide");
  $("#loginModal").modal("show");
};

const fireRegisterModal = () => {
  $("#loginModal").modal("hide");
  $("#registerModal").modal("show");
};

const openExh = () => {
  const id = $(".display-booth").data("id");
  const url = `<?=base_url()?>/page/content/${id}`;
  window.open(url, "_blank");
}

const selectExh = (id) => {

  if (login_state === '') {
    $("#loginModal").modal("show");
    return;
  }

  selectedExhItem = true;

  $(".display-booth").fadeOut();
  $(".display-booth").data("id", id);
  const row = exhData.find((item) => item.id == id);
  $("#booth-caption").html(row.name);
  $("#booth-logo").attr("src", generateImageUrl(row.logo));
  $(".display-booth").fadeIn();
}

const loadExhibitorList = async () => {
  $("#exh-list").html(
    `<div class="loading"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>`)
  const data = await $.get(base_url);
  exhData = data;
  let exhList = "";

  data.forEach((row) => {
    exhList += `
				<div class="col-md-4 col-xs-6">
					<a href="javascript:void(0)" onclick="selectExh(${row.id})" class="booth-container">
						<div class="background" style="position: relative">
							<img
								src="<?=base_url()?>assets/images/booth.png"
								class="img-fluid"
							/>
							<div class="caption">${row.name}</div>
							<div class="logo">
                <img src="${generateImageUrl(
									row.logo
								)}"  referrerpolicy="no-referrer" class="img-fluid"/>
              </div>
						</div>
					</a>
				</div>`;
  });

  $("#exh-list").html(exhList);

  setDisplayBooth()
}

const setDisplayBooth = () => {
  const lengthExh = exhData.length;

  if (lengthExh - 1 === exhIndex) {
    exhIndex = 0;
  }

  setInterval(() => {
    if (!selectedExhItem) {
      $(".display-booth").fadeOut();
      exhIndex++;
      const row = exhData[exhIndex];
      setTimeout(() => {
        $("#booth-caption").html(row.name);
        $("#booth-logo").attr("src", generateImageUrl(row.logo));
        $(".display-booth").fadeIn();
        $(".display-booth").data("id", row.id);
      }, 1000)
    }
  }, 5000);

}

$(document).ready(() => {
  if (login_state != '') {
    $("body").addClass("logged-in");
  }
});
	</script>

	</html>