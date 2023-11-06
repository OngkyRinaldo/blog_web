<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- FonAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-RailWay antialiased ">

    <!-- Page Heading -->
    <header>
        <x-main.navbar />
    </header>



    <!-- Page Content -->
    <main class="container mx-auto min-h-screen">
        @yield('main')
    </main>

    <x-main.footer.index />

    <script>
        // Select the paragraph element by its ID
        const dateParagraph = document.getElementById("date-paragraph");
      
        function formatDate(date) {
          const day = String(date.getDate()).padStart(2, "0");
          const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
          ];
          const month = monthNames[date.getMonth()];
          const year = date.getFullYear();
      
          return `${day} ${month} ${year}`;
        }
      
        // Get the current date
        const currentDate = new Date();
      
        // Format the date as "DD-Month-YYYY"
        const formattedDate = formatDate(currentDate);
      
        // Update the paragraph's content with the formatted date
        dateParagraph.textContent = formattedDate;
    </script>





</body>

</html>