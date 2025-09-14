<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: radial-gradient(circle at top left, #0f0c29, #302b63, #24243e);
    }
    .glow-border {
      border: 1px solid rgba(0, 255, 255, 0.4);
      box-shadow: 0 0 15px rgba(0, 255, 255, 0.3);
    }
  </style>
</head>
<body class="font-sans text-gray-200 min-h-screen">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-cyan-500 to-purple-600 shadow-lg py-4">
    <div class="max-w-7xl mx-auto px-6 flex justify-center items-center gap-2 text-white text-xl font-bold tracking-wider">
      <i class="fa-solid fa-database"></i> Users
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white/10 backdrop-blur-xl shadow-2xl rounded-3xl p-8 glow-border">
      
      <!-- Add New User -->
      <div class="flex justify-end mb-6">
        <a href="<?=site_url('users/create')?>"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-cyan-500 to-purple-600 hover:from-purple-600 hover:to-pink-600 text-white font-semibold px-5 py-2 rounded-full shadow-md transition-all duration-300 transform hover:scale-105">
          <i class="fa-solid fa-user-plus"></i> Add New User
        </a>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto rounded-2xl border border-cyan-600 shadow-lg">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-cyan-600 to-purple-600 text-white text-sm uppercase tracking-wide">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Last Name</th>
              <th class="py-3 px-4">First Name</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody class="text-gray-300 text-sm">
            <?php foreach($users as $user): ?>
              <tr class="hover:bg-white/10 transition duration-200">
                <td class="py-3 px-4 font-medium"><?=html_escape($user['id']);?></td>
                <td class="py-3 px-4"><?=html_escape($user['last_name']);?></td>
                <td class="py-3 px-4"><?=html_escape($user['first_name']);?></td>
                <td class="py-3 px-4">
                  <span class="bg-cyan-900 text-cyan-200 text-xs font-semibold px-3 py-1 rounded-full">
                    <?=html_escape($user['email']);?>
                  </span>
                </td>
                <td class="py-3 px-4 flex justify-center gap-3">
                  <!-- Update Button -->
                  <a href="<?=site_url('users/update/'.$user['id']);?>"
                     class="bg-gradient-to-r from-yellow-400 to-amber-500 hover:from-yellow-500 hover:to-amber-600 text-black font-semibold px-3 py-1 rounded-lg shadow flex items-center gap-1 transition duration-200">
                    <i class="fa-solid fa-pen-to-square"></i> Update
                  </a>
                  <!-- Delete Button -->
                  <a href="<?=site_url('users/delete/'.$user['id']);?>"
                     class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white px-3 py-1 rounded-lg shadow transition-all duration-300">
                     <i class="fa-solid fa-trash"></i> Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</body>
</html>
