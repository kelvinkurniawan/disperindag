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
		<link
			rel="stylesheet"
			href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"
		/>
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
				<div class="col-md-12 mb-3 text-end">
					<a href="#" class="btn btn-primary" onclick="addExhibition()"
						>Tambah</a
					>
				</div>
				<div class="col-md-12">
					<table class="table table-bordered content-table">
						<thead>
							<tr>
								<td class="text-center">ID</td>
								<td class="text-center">Title</td>
								<td class="text-center">Description</td>
								<td class="text-center">Lainnya</td>
								<td class="text-center">Action</td>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
		<div
			class="modal fade"
			id="content-modal"
			data-bs-backdrop="static"
			data-bs-keyboard="false"
			tabindex="-1"
			aria-labelledby="staticBackdropLabel"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">
							Exhibition Content
						</h5>
						<button
							type="button"
							class="btn-close"
							data-bs-dismiss="modal"
							aria-label="Close"
						></button>
					</div>
					<div class="modal-body">
						<form class="exhibition-form">
							<div class="mb-3 row">
								<div class="col-md-4">
									<label class="form-label">Title</label>
								</div>
								<div class="col-md-8">
									<input type="hidden" name="id" disabled />
									<input
										type="text"
										name="name"
										value=""
										placeholder="Content Title"
										class="form-control"
									/>
								</div>
							</div>
							<div class="mb-3 row">
								<div class="col-md-4">
									<label class="form-label">Logo URL</label>
								</div>
								<div class="col-md-8">
									<input
										type="text"
										name="logo"
										value=""
										placeholder="Logo URL"
										class="form-control"
									/>
								</div>
							</div>
							<div class="mb-3 row">
								<div class="col-md-4">
									<label class="form-label">Catalog URL</label>
								</div>
								<div class="col-md-8">
									<input
										type="text"
										name="catalog"
										value=""
										placeholder="Catalog URL"
										class="form-control"
									/>
								</div>
							</div>
							<div class="mb-3 row">
								<div class="col-md-4">
									<label class="form-label">Youtube URL</label>
								</div>
								<div class="col-md-8">
									<input
										type="text"
										name="youtube"
										value=""
										placeholder="Youtube URL"
										class="form-control"
									/>
								</div>
							</div>
							<div class="mb-3 row">
								<div class="col-md-4">
									<label class="form-label">Description</label>
								</div>
								<div class="col-md-8">
									<textarea
										name="description"
										value=""
										class="form-control"
									></textarea>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button
							type="button"
							class="btn btn-secondary"
							data-bs-dismiss="modal"
						>
							Close
						</button>
						<a class="btn btn-primary" onclick="saveExhibition()"> Simpan </a>
					</div>
				</div>
			</div>
		</div>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
			integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
			crossorigin="anonymous"
		></script>
		<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			const base_url = "<?=base_url()?>";

			const convertFormToJSON = (form) => {
				return $(form)
					.serializeArray()
					.reduce(function (json, { name, value }) {
						json[name] = value;
						return json;
					}, {});
			};

			const addExhibition = () => {
				const form = $(".exhibition-form");
				form.find("input").val("");
				form.find("textarea").val("");
				form.find("input[name='id']").attr("disabled", true);
				CKEDITOR.instances.description.setData("");
				$("#content-modal").modal("show");
			};

			const editExhibition = (id) => {
				const form = $(".exhibition-form");
				$.get(`${base_url}api?id=${id}`).then((res) => {
					form.find("input[name='id']").attr("disabled", false);
					form.find("input[name='id']").val(res.id);
					form.find("input[name='name']").val(res.name);
					form.find("input[name='logo']").val(res.logo);
					form.find("input[name='catalog']").val(res.catalog);
					form.find("input[name='youtube']").val(res.youtube);
					CKEDITOR.instances.description.setData(res.description);
					$("#content-modal").modal("show");
				});
			};

			const deleteExhibition = (id) => {
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
							url: `${base_url}api?id=${id}`,
							type: "DELETE",
							success: function (data) {
								Swal.fire("Terhapus!", "Data berhasil dihapus.", "success");
								getData();
							},
							error: function (data) {
								Swal.fire("Gagal!", "Data gagal dihapus.", "error");
							},
						});
					}
				});
			};

			const saveExhibition = () => {
				const data = convertFormToJSON($(".exhibition-form"));
				data.description = CKEDITOR.instances.description.getData();

				$.ajax({
					method: "POST",
					data: data,
					url: base_url + "api/",
					success: function (response) {
						Swal.fire({
							title: "Success",
							text: "Data berhasil disimpan",
							type: "success",
							confirmButtonText: "Ok",
						});
						CKEDITOR.instances.description.setData("");
						$("#content-modal").modal("hide");
						getData();
					},
				});
			};

			const getData = () => {
				$(".content-table").dataTable().fnClearTable();
				$(".content-table").dataTable().fnDestroy();
				$.get(`${base_url}api/`).then((res) => {
					let result = "";
					res.forEach((element) => {
						const { id, name, description } = element;

						result += `<tr>
							<td class="text-center">${id}</td>
							<td class="text-center">${name}</td>
							<td>${description.substr(0, 100)}..</td>
							<td>
								<div class="btn-group" role="group" aria-label="Basic example">
									<a href="${base_url}admin/gallery/${id}" class="btn btn-primary">Gallery</a>
									<a href="${base_url}admin/social/${id}" class="btn btn-primary">Social</a>
									<a href="${base_url}admin/store/${id}" class="btn btn-primary">Store</a>
								</div>
							</td>
							<td style="vertical-align:middle; text-align: center;">
								<a href="#" onclick="editExhibition(${id})" class="link text-info me-2" style="font-size: 18px"><i class="uil uil-edit-alt"></i></a>
								<a href="#" onclick="deleteExhibition(${id})" class="link text-danger" style="font-size: 18px"><i class="uil uil-trash"></i></a>
							</td>
						</tr>`;
					});

					$(".content-table tbody").html(result);
					$(".content-table").DataTable({ destroy: true });
				});
			};

			$(document).ready(function () {
				CKEDITOR.replace("description");
				getData();
			});
		</script>
	</body>
</html>
