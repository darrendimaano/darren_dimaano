<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory - Lavender Dream</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-image: url('https://i.pinimg.com/736x/8d/42/33/8d42338cdd2ecafc849f60f6fbd5a2e2.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }
    .overlay {
      background: rgba(240, 240, 255, 0.6);
    }
    .magic-icon {
      background: linear-gradient(135deg, #a78bfa, #c4b5fd, #ddd6fe);
      padding: 0.5rem;
      border-radius: 9999px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      animation: float 3s ease-in-out infinite;
    }
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }
    .btn-purple {
      background: linear-gradient(to right, #a78bfa, #c4b5fd);
      color: white;
    }
    .btn-purple:hover {
      background: linear-gradient(to right, #c4b5fd, #a78bfa);
    }
    .pagination a:hover {
      background-color: #c4b5fd;
      color: #4c1d95;
    }
  </style>
</head>
<body class="min-h-screen relative text-purple-900">

  <!-- Overlay -->
  <div class="absolute inset-0 overlay"></div>

  <!-- Container -->
  <div class="relative max-w-6xl mx-auto mt-10 px-4 z-10">

    <!-- User Table Card -->
    <div class="bg-white/40 backdrop-blur-2xl rounded-3xl p-6 border border-purple-200 shadow-2xl">

      <!-- Search & Add Button Above Table -->
      <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-3">
        <!-- Search -->
        <form method="get" action="<?=site_url()?>" class="flex w-full md:w-auto">
          <input 
            type="text" 
            name="q" 
            value="<?=html_escape($_GET['q'] ?? '')?>" 
            placeholder="Search student..."
            class="px-4 py-2 rounded-l-full bg-purple-50/80 text-purple-900 placeholder-purple-400 border border-purple-300 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full md:w-64">
          <button type="submit" 
                  class="px-4 py-2 rounded-r-full shadow-lg btn-purple transition duration-300">
            <i class="fa fa-search"></i>
          </button>
        </form>

        <!-- Add New User -->
        <a href="<?=site_url('users/create')?>"
           class="inline-flex items-center gap-2 font-bold px-5 py-2 rounded-full shadow-lg btn-purple transition-all duration-300 hover:scale-105">
          <i class="fa-solid fa-user-plus"></i> Add New User
        </a>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto rounded-2xl border border-purple-300 shadow-lg">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-purple-400 via-purple-300 to-purple-500 text-white text-sm uppercase tracking-wide rounded-t-3xl">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Lastname</th>
              <th class="py-3 px-4">Firstname</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody class="text-purple-900 text-sm">
            <?php foreach(html_escape($users) as $user): ?>
              <tr class="hover:bg-purple-100/50 transition duration-200 rounded-lg">
                <td class="py-3 px-4 font-medium"><?=($user['id']);?></td>
                <td class="py-3 px-4"><?=($user['last_name']);?></td>
                <td class="py-3 px-4"><?=($user['first_name']);?></td>
                <td class="py-3 px-4">
                  <span class="bg-purple-50/80 text-purple-900 text-sm font-semibold px-3 py-1 rounded-full">
                    <?=($user['email']);?>
                  </span>
                </td>
                <td class="py-3 px-4 flex justify-center gap-3">
                  <a href="<?=site_url('users/update/'.$user['id']);?>"
                     class="px-3 py-1 rounded-full shadow btn-purple flex items-center gap-1 transition duration-200 hover:scale-105">
                    <i class="fa-solid fa-pen-to-square"></i> Update
                  </a>
                  <a href="<?=site_url('users/delete/'.$user['id']);?>"
                     class="inline-flex items-center gap-2 px-3 py-1 rounded-full shadow btn-purple transition-all duration-300 hover:scale-105">
                     <i class="fa-solid fa-trash"></i> Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-4 flex justify-center pagination">
        <?php if(!empty($page)): 
            echo str_replace(
              ['<ul>', '</ul>', '<li>', '</li>', '<a', '</a>'],
              ['<div class="flex space-x-2">', '</div>', '', '', '<a class="px-3 py-1 rounded-full bg-purple-50/80 text-purple-900 shadow transition cursor-pointer"', '</a>'],
              $page
            );
        endif; ?>
      </div>

    </div>

  </div>

</body>
</html>