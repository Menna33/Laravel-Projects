<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<div class="container">
  <h2>Register</h2>
  <form  action="<?php echo e(url('/save')); ?>"   method="post"   enctype ="multipart/form-data">
  <?php echo csrf_field(); ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text"  name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email"   name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"   name = "password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text"  name="address"  class="form-control" id="exampleInputAddress" aria-describedby="" placeholder="Enter Address">
  </div>
  <div class="form-group">
                <label for="exampleInputPassword1">Gender</label>
                <br>
                <input type="radio" name="gender" value="male">
                <label for="exampleInputPassword1">Male</label>
                <br>
                <input type="radio" name="gender" value="female">
                <label for="exampleInputPassword1">Female</label>

            </div>

<div class="form-group">
    <label for="exampleInputEmail1">LinkedIN url</label>
    <input type="text"  name="linkedinurl"  class="form-control" id="exampleInputurl" aria-describedby="" placeholder="Enter LinkedIn url">
  </div>
 
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\example-app\resources\views/register.blade.php ENDPATH**/ ?>