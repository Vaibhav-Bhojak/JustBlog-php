<?php
if(session_start()){

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

    $email = $_SESSION['email'];
    $sql = "SELECT * FROM usersignup WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);  
    $response = mysqli_fetch_assoc($result);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Blod - Admin_pannel</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
        rel="stylesheet">
</head>
<body>
<nav x-data="{ isOpen: false }" class="relative bg-white shadow dark:bg-gray-800">
    <div class="container px-6 py-4 mx-auto">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex items-center justify-between">
            <div class="flex items-center justify-between">
          <h1 class="text-blue-500 text-xl font-bold mx-10"><a href="index.php">Just Blog</a></h1>
        </div>

                <!-- Mobile menu button -->
                <div class="flex lg:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>
                
                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-gray-800 lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">

                <div class="flex items-center mt-4 lg:mt-0">
                    <button class="hidden mx-4 text-gray-600 transition-colors duration-300 transform lg:block dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-400 focus:text-gray-700 dark:focus:text-gray-400 focus:outline-none" aria-label="show notifications">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <button type="button" class="flex items-center focus:outline-none" aria-label="toggle profile dropdown">
                        <div class="w-10 h-10 overflow-hidden border-2 border-gray-400 rounded-full">
                            <img src="<?php echo $response['cover'] ?>" class="object-cover w-full h-full" alt="avatar">
                        </div>

                        <h3 class="mx-2 text-gray-700 dark:text-gray-200 lg:hidden">Khatab wedaa</h3>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="flex flex-row w-auto h-full justify-center">


<section class="bg-white dark:bg-gray-900 w-auto h-auto">
<?php
if(isset($_GET['ID'])){
    $ID = $_GET['ID'];
         $postget = "SELECT * FROM post WHERE ID = '$ID'";
        $postresult = mysqli_query($conn , $postget);

        while($row = mysqli_fetch_assoc($postresult)){
    ?>
   <div class="max-w-full rounded overflow-hidden shadow-lg mt-10 justify-items-center ">
  <img class="w-1/2" src="<?php echo $row['cover'] ?>" alt="Sunset in the mountains">
  <div class="px-6 py-4">
    <div class="font-bold text-2xl mb-2"><?php echo $row['title'] ?></div>
    <p class="text-gray-700 text-base">
    <?php echo $row['desccription'] ?>
    </p>
  </div>
</div>
    <?php
     }
    } 
    ?>
</section>

</div>
</body>
</html>
<?php
}
else{
    echo "login first";
    echo "<a href = 'login.php'> <<login </a>";
}


?>