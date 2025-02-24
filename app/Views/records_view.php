<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

<div class="container">
    <div class="row">

        <!-- Main Content -->
        <main class="">
            <div class="d-flex justify-content-between align-items-center mt-4">
                <h2>Manage Records</h2>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRecordModal">
                    <i class="bi bi-plus-lg"></i> ADD
                </button>
            </div>

            <!-- Add Record Modal -->
            <div class="modal fade" id="addRecordModal" tabindex="-1" aria-labelledby="addRecordModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="addRecordModalLabel">Add Record</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('/records/create'); ?>" method="post"  enctype="multipart/form-data">  <?= csrf_field() ?> 
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">Upload File</label>
                                    <input type="file" class="form-control" id="file" name="file" required>
                                </div>

                                <button type="submit" class="btn btn-success w-100">
                                    <i class="bi bi-plus-lg"></i> Add Record
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Records Table -->
            <div class="card shadow-lg mt-4">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0">Records List</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>File</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($records as $record): ?>
                                <tr>
                                    <td><?= esc($record['id']); ?></td>
                                    <td><?= esc($record['name']); ?></td>
                                    <td><?= esc($record['description']); ?></td>
                                    <td>
                                        <?php if ($record['file_path']): ?>
                                         <a href="<?= base_url('public/' . $record['file_path']); ?>" target="_blank"> <i class="bi bi-eye">View</i> 

                                        <?php else: ?>
                                            <span class="text-muted">No File</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('/records/edit/' . $record['id']); ?>" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="<?= base_url('/records/delete/' . $record['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
