<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APPLICATION</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
</head>

<body>
    <?php $validation = \Config\Services::validation(); // Get the validation service 
    ?>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">CRUD APPLICATION</a>
        </div>
    </div>
    <div class="container">
        <h1 class="text-center mt-5">Edit User</h1>
        <hr>
        <div class="row py-5 m-5 card-body">
          
            <?= form_open('user/update/' . $user['user_id']); ?>
            <div class="col-md-6 offset-md-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= set_value('name', $user['name']); ?>">
                    <?= $validation->getError('name'); ?>

                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?= set_value('email', $user['email']); ?>">
                    <?= $validation->getError('email'); ?>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="" class="btn btn-secondary">Cancel</a>

                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</body>

</html>