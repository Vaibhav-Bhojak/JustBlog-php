<?php 
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
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
        rel="stylesheet">
</head>
<body>
<nav x-data="{ isOpen: false }" class="relative bg-white shadow dark:bg-gray-800 w-full">
    <div class="container px-6 py-4 mx-auto w-full">
        <div class="lg:flex lg:items-center lg:justify-between w-full">
            <div class="flex items-center justify-between">
            <div class="flex items-center justify-between w-1/2">
            <h1 class="text-blue-500 text-xl font-bold"><a href="index.php">Just Blog</a></h1>
        </div>

        <div class="container mx-20 flex items-center justify-center p-6 mx-auto text-gray-600 capitalize dark:text-gray-300 w-50">
            <a href="#" class="text-gray-800 transition-colors duration-300 transform dark:text-gray-200 border-b-2 border-blue-500 mx-1.5 sm:mx-6">home</a>

            <a href="#" class="border-b-2 border-transparent hover:text-gray-800 transition-colors duration-300 transform dark:hover:text-gray-200 hover:border-blue-500 mx-1.5 sm:mx-6">features</a>

            <a href="#" class="border-b-2 border-transparent hover:text-gray-800 transition-colors duration-300 transform dark:hover:text-gray-200 hover:border-blue-500 mx-1.5 sm:mx-6">pricing</a>

            <a href="#" class="border-b-2 border-transparent hover:text-gray-800 transition-colors duration-300 transform dark:hover:text-gray-200 hover:border-blue-500 mx-1.5 sm:mx-6">blog</a>

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
        </div>
    </div>
</nav>

    <div class="grid grid-cols-1 w-full sm:grid-cols-3 justify-center flex flex-row">
    <?php
    $postget = "SELECT * FROM post";
    $postresult = mysqli_query($conn , $postget);
    
    while($row = mysqli_fetch_assoc($postresult)){
    ?>
<div class="bg-white text-black w-15 h-auto ml-2 mr-2 rounded-lg shadow-xl border-1 border-current overflow-hidden , news-tab">
                <div class="relative w-full h-auto p-4 bg-gray-50">
                    <img
                        src="<?php echo $row['cover'] ?>"
                        alt="Equilibrium #3429"
                        class="w-auto  rounded-md" />
                </div>
                <div class="p-4">
                    <div class="h-10">
                        <form action="home.php" method="POST">
                            <h2 class="text-l font-bold mb-2 line-clamp-1"><a href="newsdetail.php?ID=<?php echo $row['ID'] ?>"><?php echo $row['title'] ?></a>
                                <h2>
                        </form>
                    </div>
                </div>
            </div>  
<?php } ?>
</div>  
</body>
</html>