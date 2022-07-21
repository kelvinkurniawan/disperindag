<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Jogja Premium Export Virtual Expo</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
			crossorigin="anonymous"
		/>
		<link
			rel="stylesheet"
			href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
		/>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
			rel="stylesheet"
		/>
		<style>
			body {
				font-family: "Nunito Sans", sans-serif;
			}
		</style>
	</head>
	<body>
		<div class="container py-5">
			<div class="row">
				<div class="col-md-8">
						<table class="table table-bordered content-table">
							<thead>
								<tr>
									<td class="text-center">ID</td>
									<td class="text-center">Exhibition Name</td>
									<td class="text-center">URL</td>
									<td class="text-center">Action</td>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
				</div>
				<div class="col-md-4">
					<div class="card">
						<div class="card-body">
							<h6 class="fw-bold">Tambah Gambar</h6>
							<form class="gallery-form">
								<div class="mb-3">
									<label class="form-label">URL</label>
									<input type="hidden" value="<?=$id?>" name="exhibitor_id"/>
									<input type="text" name="url" class="form-control" placeholder="Image URL"/>
								</div>
							</form>
							<a href="#" class="btn btn-primary" onclick="saveGallery()">Simpan</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
			crossorigin="anonymous"
		></script>
		<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			const base_url = "<?=base_url()?>"
			const id = "<?=$id?>"

			const convertFormToJSON = (form) => {
				return $(form)
					.serializeArray()
					.reduce(function (json, { name, value }) {
						json[name] = value;
						return json;
					}, {});
			};

			const getData = () => {
				$(".content-table").dataTable().fnClearTable();
				$(".content-table").dataTable().fnDestroy();
				$.get(`${base_url}api?id=${id}`).then((res) => {
					let result = "";
					res.gallery.forEach(element => {
						const {id, url} = element;

						result += `<tr>
							<td class="text-center">${id}</td>
							<td class="text-center">${res.name}</td>
							<td class="text-start">${url}</td>
							<td style="vertical-align:middle; text-align: center;">
								<a href="#" onclick="deleteGallery(${id})" class="link text-danger" style="font-size: 18px"><i class="uil uil-trash"></i></a>
							</td>
						</tr>`
					});

					$(".content-table tbody").html(result)
					$(".content-table").DataTable({ destroy: true });
				})
			}

			const saveGallery = () => {
				const data = convertFormToJSON($(".gallery-form"));

				$.ajax({
					url: `${base_url}api/gallery`,
					type: "POST",
					data: data,
					success: function (res) {
						Swal.fire({
							title: "Success",
							text: "Data berhasil disimpan",
							type: "success",
							confirmButtonText: "OK"
						})
						getData();
						$(".gallery-form")[0].reset();
					}
				})
			}

			const deleteGallery = (id) => {
				Swal.fire({
					title: "Apakah anda yakin?",
					text: "Data yang dihapus tidak dapat dikembalikan!",
					icon: "question",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#d33",
					confirmButtonText: "Ya, hapus!",
					cancelButtonText: "Tidak, batalkan!",
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: `${base_url}api/gallery?id=${id}`,
							type: "DELETE",
							success: function (res) {
								Swal.fire({
									title: "Success",
									text: "Data berhasil dihapus",
									type: "success",
									confirmButtonText: "OK"
								})
								getData();
							}
						})
					}
				})
			}

			$(document).ready(function(){
				getData();
			})
		</script>
	</body>
</html>