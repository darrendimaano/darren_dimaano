<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
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
<body class="min-h-screen flex items-center justify-center font-sans text-gray-200">

  <div class="bg-white/10 backdrop-blur-xl p-8 rounded-3xl glow-border w-full max-w-md animate-fadeIn">
    
    <!-- Header -->
    <div class="flex flex-col items-center mb-6">
      <div class="bg-gradient-to-br from-cyan-500 to-purple-600 rounded-full p-4 shadow-lg animate-pulse">
        <i class="fa-solid fa-user-gear text-white text-3xl"></i>
      </div>
      <h2 class="text-2xl font-bold text-cyan-400 mt-3 tracking-wide">Update User Information</h2>
      <p class="text-gray-400 text-sm">Keep your profile up to date ✨</p>
    </div>

    <!-- Form -->
    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-5">
      
      <!-- First Name -->
      <div>
        <label class="block text-cyan-300 mb-1 font-medium">First Name</label>
        <input type="text" name="first_name" value="<?= html_escape($user['first_name'])?>" required
               class="w-full px-4 py-3 bg-black/40 text-gray-200 border border-cyan-600 rounded-xl focus:ring-2 focus:ring-cyan-400 focus:outline-none shadow-sm transition duration-200">
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-cyan-300 mb-1 font-medium">Last Name</label>
        <input type="text" name="last_name" value="<?= html_escape($user['last_name'])?>" required
               class="w-full px-4 py-3 bg-black/40 text-gray-200 border border-cyan-600 rounded-xl focus:ring-2 focus:ring-cyan-400 focus:outline-none shadow-sm transition duration-200">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-cyan-300 mb-1 font-medium">Email Address</label>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
               class="w-full px-4 py-3 bg-black/40 text-gray-200 border border-cyan-600 rounded-xl focus:ring-2 focus:ring-cyan-400 focus:outline-none shadow-sm transition duration-200">
      </div>

      <!-- Save Button -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-cyan-500 to-purple-600 hover:from-purple-600 hover:to-pink-600 text-white font-semibold py-3 rounded-xl shadow-lg transition duration-300 transform hover:scale-105">
        <i class="fa-solid fa-save mr-2"></i> Save Changes
      </button>
    </form>
  </div>
</body>
</html>
