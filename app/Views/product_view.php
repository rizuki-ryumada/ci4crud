<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('layout/header'); ?>
</head>
<body>
    <!-- navbar -->
    <?= view('layout/navbar.php'); ?>
    
    <div class="container">
        <h3><?= $title; ?></h3>
        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#tambahProdukModal">Add New</button>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($product as $row): ?>
                            <tr>
                                <td><?= $row->product_name; ?></td>
                                <td><?= $row->product_price; ?></td>
                                <td><?= $row->category_name; ?></td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->product_id; ?>" data-name="<?= $row->product_name; ?>" data-price="<?= $row->product_price; ?>" data-category_id="<?= $row->product_category_id; ?>"><i class="fa fa-pencil-square"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->product_id; ?>"><i class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    <!-- footer -->
    <?= view('layout/footer.php'); ?>

    <!-- Modal tambah Produk -->
    <div class="modal fade" id="tambahProdukModal" tabindex="-1" role="dialog" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahProdukModalLabel">Tambah Produk Baru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form_tambahProduk" action="<?= base_url('pages'); ?>/save" method="POST">
						<div class="form-group">
							<label for="productName_add">Nama Produk</label>
							<input type="text" id="productName_add" class="form-control" name="product_name" placeholder="Masukkan nama produk">
						</div>
						<div class="form-group">
							<label for="productPrice_add">Harga</label>
							<input type="text" id="productPrice_add" class="form-control" name="product_price" placeholder="Masukkan harga produk">
						</div>
						<div class="form-group">
							<label for="productCategory_add">Kategori</label>
							<select name="product_category" id="productCategory_add" class="form-control custom-select">
								<option value="">Pilih...</option>
								<?php foreach($category as $row): ?>
									<option value="<?= $row->category_id; ?>"><?= $row->category_name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button form="form_tambahProduk" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal edit Produk -->
    <div class="modal fade" id="editProdukModal" tabindex="-1" role="dialog" aria-labelledby="editProdukModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editProdukModalLabel">Edit Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form_editProduk" action="<?= base_url('pages'); ?>/update" method="POST">
						<div class="form-group">
							<label for="productName_edit">Nama Produk</label>
							<input type="text" id="productName_edit" class="form-control" name="product_name" placeholder="Masukkan nama produk">
						</div>
						<div class="form-group">
							<label for="productPrice_edit">Harga</label>
							<input type="text" id="productPrice_edit" class="form-control" name="product_price" placeholder="Masukkan harga produk">
						</div>
						<div class="form-group">
							<label for="productCategory_edit">Kategori</label>
							<select name="product_category_id" id="productCategory_edit" class="form-control custom-select">
								<option value="">Pilih...</option>
								<?php foreach($category as $row): ?>
									<option value="<?= $row->category_id; ?>"><?= $row->category_name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<input type="hidden" name="product_id" class="editProduk_id">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button form="form_editProduk" type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Sunting</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal hapus Produk -->
    <div class="modal fade" id="hapusProdukModal" tabindex="-1" role="dialog" aria-labelledby="hapusProdukModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="hapusProdukModalLabel">Hapus Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form_hapusProduk" action="<?= base_url('pages'); ?>/delete" method="POST">
						
						<h4>Apa anda yakin ingin menghapus produk ini?</h4>

						<input type="hidden" name="product_id" class="hapusProduk_id">
					
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button form="form_hapusProduk" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
				</div>
			</div>
		</div>
	</div>

<!-- other script -->
<script>
	$(document).ready(function() {

		// dapatkan Edit Produk
		$('.btn-edit').on('click', function() {
			// dapatkan data dari tombol edit
			const id = $(this).data('id');
			const name = $(this).data('name');
			const price = $(this).data('price');
			const category = jQuery(this).data('category_id');

			// atur data untuk form edit
			$('.editProduk_id').val(id)
			$('#productName_edit').val(name);
			$('#productPrice_edit').val(price);
			$('#productCategory_edit').val(category).trigger('change');

			// Call Modal Edit
			$('#editProdukModal').modal('show');
		});

		// dapatkan Hapus Produk
		$('.btn-delete').on('click', function(){
			//dapatkan data dari button edit
			const id = $(this).data('id');

			// atur data form edit
			$('.hapusProduk_id').val(id);

			// Call Modal Edit
			$('#hapusProdukModal').modal('show');
		})

	});
</script>

</body>
</html>