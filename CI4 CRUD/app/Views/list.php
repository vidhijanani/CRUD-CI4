<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APPLICATION</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">CRUD APPLICATION</a>
        </div>
    </div>    
    <div class="container">
       <div class="row">
        <div class="col-md-8">
             <h1 class="text-center mt-5">View User</h1>
        </div>
        <div class="col-md-4">
            <a href="<?php  echo base_url('user/create');?>" class="btn btn-primary float-right mt-5"><i class="fas fa-plus"></i> Add User</a >
        </div> 
       </div>
        <hr>
       <div class="row">
        <div class="col-md-6 offset-md-3">
            <table class="table table-striped">
                <thead>
                    <tr> 
                        <th>ID</th>   
                        <th>Name</th>   
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                     <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('success') ?>
                  
                        <meta http-equiv="refresh" content="1;url=<?= base_url('user/index'); ?>">
                    </div>
                <?php endif; ?>
                    <?php  if(!empty($users)) { foreach($users as $user) {?>
                    <tr>
                        <td> <?php echo $user['user_id']?></td>
                        <td> <?php echo $user['name']?></td>
                        <td> <?php echo $user['email']?></td>
                        <td>
                            <a href="<?php echo base_url('user/edit/' . $user['user_id']);?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        </td>
                        <td>
                            <a href="<?php echo base_url('user/delete/' . $user['user_id']);?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                        </td>


                    </tr>
                    <?php } } else {?>
                            <tr>
                                <td colspan="5">
                                    Records not found
                                </td>   
                            </tr>
                    <?php }?>
                </thead>
                
       </div>
    </div>
</body>
</html>
