<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Record</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="container py-4">

        


    <div id = "examplemodal" class="container d-flex justify-content-center">
        <div class="card mt-4 shadow-lg w-50">
            <div class="card-header bg-warning text-dark text-center">
                <h3 class="mb-0">Edit Record</h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/products/update/' . $record['id']); ?>" method="post"  enctype="multipart/form-data" class="d-flex flex-column align-items-center">  <?= csrf_field() ?> 
                    
                    <div class="mb-3 w-75">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $record['name']; ?>" required>
                    </div>

                    <div class="mb-3 w-75">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required><?= $record['description']; ?></textarea>
                    </div>

                    <div class="mb-3 w-75">
                        <label for="file" class="form-label">Upload New File</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>

                    <!-- Hidden field for existing file -->
                    <input type="hidden" name="existing_file" value="<?= $record['file_path']; ?>">

                    <!-- Show existing file if available -->
                    <?php if (!empty($record['file_path'])): ?>
                        <div class="mb-3 w-75">
                            <label class="form-label">Current File:</label>
                            <a href="<?= base_url('public/' . $record['file_path']); ?>" class="btn btn-info btn-sm" target="_blank">
                                <i class="bi bi-eye"></i> View File
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="w-75">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-save"></i> Update Record
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
