<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tabango Library Inventory System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
</head>
<style>
    html,
    body {
        overflow: hidden;
        height: 100%;
    }
</style>


<body class="bg-gray-100">
    <div class="bg-white px-4 md:px-6 py-4 shadow flex flex-col md:flex-row items-center justify-between">
        <div class="flex items-center space-x-3 mb-2 md:mb-0">
            <lord-icon src="https://cdn.lordicon.com/zbtbhzsg.json" trigger="morph" state="morph-open"
                style="width:30px;height:30px">
            </lord-icon>

            <h1 class="text-lg md:text-xl font-semibold text-teal-900">Tabango Public Library</h1>
        </div>
        <div class="flex items-center space-x-3">
            <button
                class="bg-teal-500 hover:bg-teal-600 text-white px-3 py-1.5 rounded-md text-sm font-medium shadow">Barcode
                Generator</button>
            <lord-icon src="https://cdn.lordicon.com/qikuvfgb.json" trigger="hover"
                style="width:30px;height:30px"></lord-icon>
            <div class="relative">
                <button class="text-teal-700 hover:text-teal-800 focus:outline-none">
                    <i class="fas fa-bell text-lg md:text-xl"></i>
                    <span
                        class="absolute -top-1 -right-1 inline-flex items-center justify-center px-1.5 py-0.5 text-[10px] font-bold text-white bg-red-500 rounded-full">2</span>
                </button>
            </div>
            <button><i class="fas fa-user-circle text-xl md:text-2xl text-teal-700"></i></button>
        </div>
    </div>

    <section class="relative w-full h-auto min-h-screen bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f');">
        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center py-10 md:py-20">
            <div class="w-full px-4 md:px-10 text-white">
                <div
                    class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center mb-10 space-y-6 md:space-y-0">
                    <div class="md:w-2/3 w-full">
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-tight mb-4">
                            Tabango Library Inventory System:<br><span class="text-teal-300">Get Started Today!</span>
                        </h2>
                        <div class="flex flex-col sm:flex-row mt-4 max-w-md bg-white rounded-md overflow-hidden shadow">
                            <input id="searchInput" type="text" placeholder="Search for books..."
                                class="flex-1 p-3 outline-none text-gray-800">
                            <button onclick="searchBooks()"
                                class="bg-teal-500 text-white px-4 py-2 hover:bg-teal-600"><i
                                    class="fas fa-search"></i></button>
                        </div>
                        <div id="searchResults" class="bg-white text-black mt-4 p-3 rounded shadow max-w-md hidden">
                        </div>
                    </div>
                    <div class="md:w-1/3 w-full flex justify-center">
                        <img src="https://scontent.fceb1-5.fna.fbcdn.net/v/t39.30808-1/510592733_1031021885880545_7050038946382316162_n.jpg?stp=dst-jpg_s200x200_tt6&_nc_cat=110&ccb=1-7&_nc_sid=2d3e12&_nc_eui2=AeEMHZ7-u8cqiINs1GKtUkoNteKxILqCL6y14rEguoIvrNnj6F-04ARSwiAO-MevG_go3NQoVpkXf-ph49NIBca9&_nc_ohc=DaKfPXhFGTUQ7kNvwEqilec&_nc_oc=AdlW2y8n5zCIwPULc9yocTimOUxIL8NCfa1TzGnhg2AyKrRdPfRGWFQnEXeuOqLGx7VnArNqbeJnVt7RzYgbEgwF&_nc_zt=24&_nc_ht=scontent.fceb1-5.fna&_nc_gid=riQtBnrkGmX25Mbwus4NqQ&oh=00_AfMv4O5DXCInv1R95R3jNveFQUA2-l8l7gWEdlYiojDerA&oe=6866F525"
                            alt="Tabango Seal"
                            class="w-40 h-40 rounded-full p-1 shadow-lg border-4 border-white bg-white object-cover">
                    </div>
                </div>

                <div
                    class="max-w-5xl mx-auto bg-white p-5 mt-4 rounded-lg border border-gray-300 backdrop-blur-sm bg-opacity-95 drop-shadow-xl">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        <div onclick="document.getElementById('addMaterialModal').classList.remove('hidden')"
                            class="bg-white border border-gray-200 rounded-md p-4 shadow-sm hover:shadow-md transition cursor-pointer">
                            <h3 class="text-teal-700 font-semibold text-base mb-2">Book Details</h3>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li><i class="fas fa-plus text-teal-500 text-sm mr-1"></i> New Materials</li>
                                <li><i class="fas fa-book-open text-teal-500 text-sm mr-1"></i> View Book</li>
                            </ul>
                        </div>
                        <div
                            class="bg-white border border-gray-200 rounded-md p-4 shadow-sm hover:shadow-md transition cursor-pointer">
                            <h3 class="text-teal-700 font-semibold text-base mb-2">Book Circulation</h3>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li><i class="fas fa-arrow-right text-teal-500 text-sm mr-1"></i> Borrowed Books</li>
                                <li><i class="fas fa-arrow-left text-teal-500 text-sm mr-1"></i> Returned Books</li>
                            </ul>
                        </div>
                        <div
                            class="bg-white border border-gray-200 rounded-md p-4 shadow-sm hover:shadow-md transition cursor-pointer">
                            <h3 class="text-teal-700 font-semibold text-base mb-2">Reports</h3>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li><i class="fas fa-calendar text-teal-500 text-sm mr-1"></i> Monthly Report</li>
                                <li><i class="fas fa-chart-bar text-teal-500 text-sm mr-1"></i> Statistics</li>
                            </ul>
                        </div>
                        <div onclick="showToast()"
                            class="bg-white border border-gray-200 rounded-md p-4 shadow-sm hover:shadow-md transition cursor-pointer">
                            <h3 class="text-teal-700 font-semibold text-base mb-2">Notification</h3>
                            <ul class="text-sm text-gray-700 space-y-1">
                                <li><i class="fas fa-bell text-red-500 text-sm mr-1"></i><span
                                        class="text-green-600 font-medium">2 Books due today</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="toast" class="fixed top-5 right-5 bg-green-600 text-white px-5 py-3 rounded shadow-lg text-sm hidden z-50">
        📢 Reminder: You have 2 books due today!
    </div>

    <div id="addMaterialModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
        <form method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-xl font-semibold mb-4 text-teal-700">Add Material</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                <input type="text" name="type" placeholder="Type" class="border p-2 rounded" />
                <input type="text" name="category" placeholder="Category" class="border p-2 rounded" />
                <input type="text" name="status" placeholder="Status" class="border p-2 rounded" />
                <input type="text" name="title" placeholder="Book Title" class="border p-2 rounded" />
                <input type="text" name="author" placeholder="Author" class="border p-2 rounded" />
                <input type="text" name="accession" placeholder="Accession No." class="border p-2 rounded" />
                <input type="text" name="shelf" placeholder="Book Shelf No." class="border p-2 rounded" />
                <input type="text" name="year" placeholder="Year" class="border p-2 rounded" />
                <input type="text" name="source" placeholder="Source" class="border p-2 rounded" />
                <input type="text" name="publisher" placeholder="Publisher" class="border p-2 rounded" />
                <input type="text" name="volume" placeholder="Volume" class="border p-2 rounded" />
                <input type="number" name="qty" placeholder="Quantity" class="border p-2 rounded" />
                <input type="number" name="price" placeholder="Price" class="border p-2 rounded" />
                <input type="file" name="file" class="border p-2 rounded col-span-1 sm:col-span-2" />
            </div>
            <div class="flex justify-end mt-4 space-x-2">
                <button type="button" onclick="document.getElementById('addMaterialModal').classList.add('hidden')"
                    class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded">Cancel</button>
                <button type="submit" name="add_material"
                    class="px-4 py-2 bg-teal-600 text-white hover:bg-teal-700 rounded">Save</button>
            </div>
        </form>
    </div>

    <script>
        function searchBooks() {
            const query = document.getElementById("searchInput").value;
            const resultsBox = document.getElementById("searchResults");
            if (!query.trim()) {
                resultsBox.classList.add("hidden");
                return;
            }
            setTimeout(() => {
                const sampleBooks = ["JavaScript Essentials", "CSS for Beginners", "Tailwind Mastery", "PHP for Dynamic Web", "MySQL Quick Guide", "Library Inventory 101"];
                const filtered = sampleBooks.filter(book => book.toLowerCase().includes(query.toLowerCase()));
                resultsBox.innerHTML = filtered.length > 0 ? <ul class="list-disc pl-4">${filtered.map(book => `<li>${book}</li>).join('')}</ul>` : <p>No results found for "<strong>${query}</strong>"</p>;
                    resultsBox.classList.remove("hidden");
      }, 500);
    }
                    function showToast() {
      const toast = document.getElementById("toast");
                    toast.classList.remove("hidden");
      setTimeout(() => {toast.classList.add("hidden"); }, 3000);
    }
    </script>
</body>

</html>