<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Roboto+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body { 
      font-family: 'Roboto Mono', monospace; 
      background: linear-gradient(to right, #0d0d1a, #141432, #0d0d1a);
      color: #e5e5e5;
    }
    .font-title { 
      font-family: 'Orbitron', sans-serif; 
      letter-spacing: 2px; 
      text-transform: uppercase;
    }
    .btn-hover:hover { 
      box-shadow: 0 0 12px #00f0ff, 0 0 24px #8a2be2; 
      transform: scale(1.05); 
    }
    .futuristic-card {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(0,255,255,0.3);
      backdrop-filter: blur(10px);
    }
    .hp-page {
      color: #00e0ff !important;
      padding: 6px 12px;
      border-radius: 6px;
      border: 1px solid rgba(0,255,255,0.4);
      transition: all 0.3s ease-in-out;
    }
    .hp-page:hover {
      background: rgba(0,255,255,0.2);
    }
    .hp-current {
      padding: 6px 12px;
      border-radius: 6px;
      background: linear-gradient(90deg, #00f0ff, #8a2be2);
      color: black !important;
      font-weight: bold;
    }
    .logout-btn {
      background: linear-gradient(to right, #8a2be2, #00c9ff);
      padding: 8px 16px;
      border-radius: 8px;
      color: white;
      font-weight: bold;
      transition: 0.3s;
    }
    .logout-btn:hover {
      box-shadow: 0 0 15px #00f0ff, 0 0 30px #8a2be2;
    }
  </style>
</head>
<body class="min-h-screen">

  <!-- Header -->
  <nav class="bg-gradient-to-r from-cyan-700 via-indigo-800 to-purple-900 shadow-lg border-b-2 border-cyan-400">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-cyan-200 font-title text-2xl flex items-center gap-2">
        <i class="fa-solid fa-user-astronaut"></i> Student Directory
      </h1>
    </div>
  </nav>

  <!-- Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="futuristic-card shadow-xl rounded-xl p-6">

      <!-- Top Actions -->
      <div class="flex justify-between items-center mb-6">
        
        <!-- Search Bar -->
        <form method="get" action="<?=site_url('/users')?>" class="mb-4 flex justify-end">
          <input 
            type="text" 
            name="q" 
            value="<?=html_escape($_GET['q'] ?? '')?>" 
            placeholder="Search student..." 
            class="px-4 py-2 border border-cyan-400 rounded-l-lg bg-black/40 text-cyan-200 focus:outline-none focus:ring-2 focus:ring-purple-500 w-64">
          <button type="submit" class="bg-gradient-to-r from-cyan-600 to-purple-600 hover:from-cyan-500 hover:to-purple-500 text-white px-4 py-2 rounded-r-lg shadow transition-all duration-300">
            <i class="fa fa-search"></i>
          </button>
        </form>

        <!-- Add Button -->
        <a href="<?=site_url('users/create')?>"
           class="btn-hover inline-flex items-center gap-2 bg-gradient-to-r from-purple-700 to-cyan-600 text-white font-bold px-5 py-2 rounded-lg shadow-md transition-all duration-300">
          <i class="fa-solid fa-user-plus"></i> Add New 
        </a>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto rounded-xl border border-cyan-400">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-indigo-800 to-purple-900 text-cyan-200 uppercase tracking-wider font-title text-sm">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Lastname</th>
              <th class="py-3 px-4">Firstname</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody class="text-gray-200 text-sm">
            <?php if(!empty($users)): ?>
              <?php foreach(html_escape($users) as $user): ?>
                <tr class="hover:bg-purple-700/30 transition duration-300">
                  <td class="py-3 px-4 font-medium"><?=($user['id']);?></td>
                  <td class="py-3 px-4"><?=($user['last_name']);?></td>
                  <td class="py-3 px-4"><?=($user['first_name']);?></td>
                  <td class="py-3 px-4"><?=($user['email']);?></td>
                  <td class="py-3 px-4 flex justify-center gap-3">
                    <a href="<?=site_url('users/update/'.$user['id']);?>"
                       class="btn-hover bg-gradient-to-r from-green-600 to-cyan-600 text-white px-3 py-1 rounded-lg shadow flex items-center gap-1">
                      <i class="fa-solid fa-pen-to-square"></i> Update
                    </a>
                    <a href="<?=site_url('users/delete/'.$user['id']);?>"
                       class="btn-hover bg-gradient-to-r from-red-700 to-purple-700 text-white px-3 py-1 rounded-lg shadow flex items-center gap-1">
                      <i class="fa-solid fa-trash"></i> Delete
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="5" class="py-4 text-gray-400">No students found.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

  <!-- Pagination + Logout -->
<div class="mt-6 flex justify-between items-center">
  
  <!-- Pagination -->
  <div class="flex items-center space-x-4">
    <?php if (!empty($page)): ?>
      <?php 
        // Convert default CodeIgniter pagination
        $customPage = str_replace(
          ['<a ', '<strong>', '</strong>'],
          [
            '<a class="hp-page px-3 py-1"',
            '<span class="hp-current px-3 py-1">',
            '</span>'
          ],
          $page
        );

        // Extra: Ensure "First", "Prev", "Next", "Last" are properly spaced
        $customPage = str_replace(
          ['First', 'Prev', 'Next', 'Last'],
          [
            '<span class="hp-page">First</span>',
            '<span class="hp-page">Prev</span>',
            '<span class="hp-page">Next</span>',
            '<span class="hp-page">Last</span>'
          ],
          $customPage
        );

        echo '<div class="flex items-center gap-6">'.$customPage.'</div>';
      ?>
    <?php endif; ?>
  </div>

  <!-- Logout Button -->
  <a href="<?=site_url('auth/logout');?>" class="logout-btn flex items-center gap-2">
    <i class="fa-solid fa-right-from-bracket"></i> Logout
  </a>
</div>
