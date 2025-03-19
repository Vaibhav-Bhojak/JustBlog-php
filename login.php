<?php
session_start();
$_SESSION['loggedIn'] = false;
$servername = "localhost";
$username = "root";
$password = "";
$database = "justblog";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Error ! We cannot connect to the server" . mysqli_connect_error());
} else {
    echo "<script>console.log('Connected to server')</script>";
}

if(isset($_POST['submit'])){
    $errors = array();
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM usersignup WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);  
    $check = mysqli_fetch_assoc($result);


    if(isset($check['email']) == $email && $check['password'] == $password){
        echo "user found";
        header('location: your_pannel.php');
        $_SESSION['loggedIn'] = true;
        $_SESSION['email'] = $email;
     }
    else{
        $errors[] = "User not Found";
       $err1 = "user not found";
        $_SESSION['loggedIn'] = false;
     }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Just Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
        rel="stylesheet">
</head>
<body>
    <?php
    if(!empty($errors)){
    ?>
    
<div class="w-full text-white bg-red-500">
    <div class="container flex items-center justify-between px-6 py-4 mx-auto">
        <div class="flex">
            <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                </path>
            </svg>

            <p class="mx-3"><?php echo $err1 ?></p>
        </div>

        <button class="p-1 transition-colors duration-300 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
</div>
<?php } ?>
    
<h1 class="text-blue-500 text-xl font-bold mx-10"><a href="index.php">Just Blog</a></h1>

<section class="bg-gray-100 dark:bg-gray-900">
    
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Create an account
              </h1>
              <form class="space-y-4 md:space-y-6" action="login.php" method="POST" enctype="multipart/form-data">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required/>
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>
                  </div>
    
                  <button type="submit" name="submit" class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Dose not have an account? <a href="signup.php" class="font-medium text-primary-600 hover:underline hover:text-blue-700 dark:text-primary-500">Signup here</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>


<script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>
</html>
