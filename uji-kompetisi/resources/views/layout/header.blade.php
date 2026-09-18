<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Manajemen Data Buku</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* Menu tiga garis */
        .menu-container {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .menu-button {
            background: #7047e8;
            color: white;
            border: none;
            border-radius: 8px;
            width: 45px;
            height: 40px;
            font-size: 24px;
            cursor: pointer;
        }

        /* Isi menu */
        .menu-list {
            display: none;
            position: absolute;
            top: 50px;
            left: 0;
            background: white;
            width: 180px;
            padding: 10px 0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .menu-list.show {
            display: block;
        }

        .menu-list a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: #4b16a8;
            font-weight: bold;
        }

        .menu-list a:hover {
            background: #f0edff;
        }

        /* Tombol logout */
        .logout-button {
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            padding: 12px 20px;
            color: #4b16a8;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #f0edff;
        }

        /* Isi halaman */
        .user-section {
            margin-top: 60px;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- MENU -->
    <div class="menu-container">

        <!-- Tombol tiga garis -->
        <button type="button" class="menu-button" onclick="toggleMenu()">
            ☰
        </button>

        <!-- Isi menu -->
        <div class="menu-list" id="menuList">

            <a href="/kategori">
                Kategori
            </a>

            <a href="/penerbit">
                Penerbit
            </a>

            <a href="/buku">
                Buku
            </a>

            @if (Auth::check())

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="logout-button">
                        Logout
                    </button>
                </form>

            @else

                <a href="{{ route('login') }}">
                    Login
                </a>

            @endif

        </div>

    </div>


    <!-- ISI HALAMAN -->
    <div class="user-section">

        <h1>Manajemen Data Buku</h1>

        @if (Auth::check())

            <p>
                
            </p>

        @endif

    </div>


<script>
    function toggleMenu() {
        const menu = document.getElementById('menuList');

        menu.classList.toggle('show');
    }
</script>