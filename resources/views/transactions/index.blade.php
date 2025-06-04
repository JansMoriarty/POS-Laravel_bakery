<!-- <!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    Font Awesome
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <h1>Daftar Produk</h1>

    <a href="{{ route('products.create') }}">Tambah Produk</a><br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->kategori }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->unit }}</td>
                    <td>
                        @if($product->gambar)
                            <img src="{{ asset('images/' . $product->gambar) }}" width="50">
                        @else
                            Tidak ada
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.update.form', $product->id) }}">Edit</a>

                        Form untuk hapus produk dengan ikon
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus produk ini?')" style="border:none; background:none;">
                                <i class="fas fa-trash-alt" style="color:red; font-size:20px;"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> -->


<!--
=========================================================
* Soft UI Dashboard 3 - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/cremeco.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Créme Co.
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
                <img src="../assets/img/cremeco.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Créme Co.</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  " href="{{route('home')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                                                <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('products.index') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="office" transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                                                <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Products Management</span>
                    </a>
                </li>
                @php
                $user = Session::get('user');
                @endphp
                @if ($user && $user->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link  " href="{{route('user_pos.index')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(453.000000, 454.000000)">
                                                <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
                @endif

                
                <li class="nav-item">
                    <a class="nav-link  active" href="../pages/virtual-reality.html">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>box-3d-50</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(603.000000, 0.000000)">
                                                <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                                                <path class="color-background opacity-6" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"></path>
                                                <path class="color-background opacity-6" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Transactions</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  " href="{{route('laporan.index')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(453.000000, 454.000000)">
                                                <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Report</span>
                    </a>
                </li>
            </ul>
        </div>

    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->

        <!-- End Navbar -->

        <div class="container-fluid mt-4">
            <div class="row">
                <!-- Konten Utama (Produk, dll) -->
                <div class="col-lg-9 col-md-8">
                    <!-- Category Filter Cards -->
                    <div class="categories-wrapper mb-3 d-flex flex-wrap gap-3">
                        <a href="{{ route('kasir.index') }}" class="category-card {{ request()->routeIs('kasir.index') && !request('category') ? 'active' : '' }}">
                            <div class="icon-wrapper"><i class="fas fa-utensils"></i></div>
                            <div class="category-text">All Menu</div>
                        </a>

                        <a href="{{ route('kasir.index', ['category' => 'pastry']) }}" class="category-card {{ request('category') == 'pastry' ? 'active' : '' }}">
                            <div class="icon-wrapper"><i class="fas fa-cookie-bite"></i></div>
                            <div class="category-text">Pastry</div>
                        </a>

                        <a href="{{ route('kasir.index', ['category' => 'with cheese']) }}" class="category-card {{ request('category') == 'with cheese' ? 'active' : '' }}">
                            <div class="icon-wrapper"><i class="fas fa-cheese"></i></div>
                            <div class="category-text">Cheese</div>
                        </a>

                        <a href="{{ route('kasir.index', ['category' => 'cake']) }}" class="category-card {{ request('category') == 'cake' ? 'active' : '' }}">
                            <div class="icon-wrapper"><i class="fas fa-birthday-cake"></i></div>
                            <div class="category-text">Cake</div>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                @foreach($products as $product)
                                <div class="product-card" style="position: relative; cursor: pointer;" data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}"
                                    data-price="{{ $product->price }}"
                                    data-image="{{ asset('images/' . $product->gambar) }}">

                                    <!-- Gambar produk -->
                                    <div class="img-container">
                                        @if($product->gambar)
                                        <img src="{{ asset('images/' . $product->gambar) }}" width="100%" height="200" style="object-fit: cover;">
                                        @endif
                                    </div>

                                    <div class="title-stock">
                                        <h4>{{ $product->name }}</h4>
                                        <p class="stok">{{ $product->stock }} (s).</p>
                                    </div>

                                    <div class="price-category">
                                        <div class="tag">{{ $product->kategori }}</div>
                                        <div class="price" style="font-size: 15px;">Rp. {{ number_format($product->price, 2) }}</div>
                                    </div>


                                </div>
                                @endforeach




                            </div>
                        </div>
                    </div>
                </div>

                <div class="invoice-sidebar">
                    <div class="card shadow-sm p-3 d-flex flex-column" style="height: 100vh;">
                        <div class="mb-3" style="display: flex; align-items: center; color:black;">
                            <i class="fas fa-cash-register" style="font-size: 1.3rem; margin-right: 8px;"></i>
                            <h6 class="ms-1" style="margin: 0; line-height: 1;">Kasir</h6>
                        </div>




                        <!-- Area scroll untuk list item -->
                        <div class="scroll-area" style="flex: 1 1 auto; overflow-y: auto; margin-bottom: 10px;">
                            <ul class="list-group mb-2" id="invoice-list">
                                <!-- Item akan ditambahkan lewat JS -->
                            </ul>

                            <!-- Pesan jika kosong -->
                            <div id="empty-message" class="text-center text-muted mt-5">
                                <i class="bi bi-exclamation-circle" style="font-size: 4rem; color:#B6B6B6;"></i>
                                <p style="font-size: 16px; color:#B6B6B6;">Belum ada produk <br> yang dipilih</p>

                            </div>
                        </div>

                        <hr>

                        <!-- Bagian subtotal & cash input -->
                        <div>
                            <div class="payment-box p-3 mb-1">
                                <div class="d-flex justify-content-between mb-2">
                                    <p>Sub Total</p>
                                    <strong id="subtotal-display">Rp 0</strong>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label for="cash-input" class="label-cash">Cash</label>
                                    <div class="input-wrapper d-flex align-items-center">
                                        <span class="currency-label">Rp</span>
                                        <input type="number" id="cash-input" min="0">
                                    </div>
                                </div>
                            </div>


                            <!-- Tombol untuk submit order -->
                            <button class="btn btn-primary w-100 mt-3" id="place-order-btn">Place Order</button>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </main>
    <!-- Modal Konfirmasi Logout -->
    <div id="confirmModalLogout" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.4); justify-content:center; align-items:center; z-index:9999;">
        <div style="background:white; padding:30px; border-radius:20px; width:600px; display: flex; gap: 20px; align-items: center;">
            <!-- Lottie kiri -->
            <div style="flex: 0 0 200px; display: flex; justify-content: center;">
                <dotlottie-player
                    src="https://lottie.host/ab764c43-5e1a-4eb8-94d6-c8af2945f78f/bMgL8Ph3ek.lottie"
                    background="transparent"
                    speed="1"
                    style="width: 200px; height: 200px"
                    loop
                    autoplay>
                </dotlottie-player>
            </div>

            <!-- Konten kanan -->
            <div style="flex: 1;">
                <h3 style="margin-top: 0;">Keluar dari akun?</h3>
                <p style="font-size:14px;">Apakah kamu yakin ingin logout dari akunmu?</p>
                <div style="margin-top: 20px; display:flex; gap: 10px;">
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" style="background:crimson; color:white; border:none; padding:8px 16px; border-radius:8px;">Ya, Logout</button>
                    </form>
                    <button onclick="hideConfirmModal()" style="background:#ccc; border:none; padding:8px 16px; border-radius:8px;">Batal</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Cash Kosong -->
    <div class="modal fade" id="cashAlertModal" tabindex="-1" aria-labelledby="cashAlertModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4" style="border: none; background: #fff; border-radius: 12px;">
                <div class="modal-body">
                    <dotlottie-player
                        src="https://lottie.host/562cec2c-2775-4018-bd58-3c398d19a741/1LSGlnJTYY.lottie"
                        background="transparent"
                        speed="1"
                        style="width: 160px; height: 200px; margin: 0 auto;"
                        loop
                        autoplay>
                    </dotlottie-player>
                    <h5 class="mt-3" id="cashAlertModalLabel">Masukkan jumlah cash yang valid!</h5>
                    <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Transaksi Sukses -->
    <!-- Modal Transaksi Sukses -->
    <div id="successModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.4); justify-content:center; align-items:center; z-index:9999;">
        <div style="background:white; padding:30px; border-radius:20px; width:400px; text-align:center;">
            <h3>Transaksi Berhasil!</h3>
            <div style="flex: 0 0 200px; display: flex; justify-content: center;">
                <dotlottie-player
                    src="https://lottie.host/de50eb6a-717a-484d-8254-204776784d35/w6fwOnxOCl.lottie"
                    background="transparent"
                    speed="1"
                    style="width: 200px; height: 200px"
                    loop
                    autoplay>
                </dotlottie-player>
            </div>
            <div style="margin-top:20px;">
                <button id="viewReceiptBtn" style="margin-right:10px; padding:10px 20px; background: #F97417; color:white; border:none; border-radius:10px;">Lihat Receipt</button>
                <button onclick="hideSuccessModal()" style="padding:10px 20px; background:gray; color:white; border:none; border-radius:10px;">Tutup</button>
            </div>
        </div>
    </div>


    <script
        src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
        type="module">
    </script>
    <script>
        function showLogoutModal(event) {
            event.preventDefault();
            document.getElementById('confirmModalLogout').style.display = 'flex';
        }

        function hideConfirmModal() {
            document.getElementById('confirmModalLogout').style.display = 'none';
        }

        function showSuccessModal(receiptUrl) {
            document.getElementById('successModal').style.display = 'flex';
            const viewReceiptBtn = document.getElementById('viewReceiptBtn');
            viewReceiptBtn.onclick = function() {
                window.location.href = receiptUrl;
            };
        }


        function hideSuccessModal() {
            document.getElementById('successModal').style.display = 'none';
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.product-card');
            const invoiceList = document.getElementById('invoice-list');
            const emptyMessage = document.getElementById('empty-message');
            let invoiceItems = {};

            // Fungsi untuk update pesan kosong
            function updateEmptyMessage() {
                if (Object.keys(invoiceItems).length === 0) {
                    emptyMessage.style.display = 'block';
                } else {
                    emptyMessage.style.display = 'none';
                }
            }

            // Panggil pertama kali untuk inisialisasi
            updateEmptyMessage();

            // Handle klik produk
            productCards.forEach(card => {
                card.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const price = parseFloat(this.getAttribute('data-price'));
                    const image = this.getAttribute('data-image');

                    // Jika produk sudah ada di invoice, tambah quantity
                    if (invoiceItems[id]) {
                        invoiceItems[id].qty += 1;
                        const qtySpan = invoiceList.querySelector(`li[data-id="${id}"] .qty-number`);
                        qtySpan.textContent = invoiceItems[id].qty;
                    } else {
                        // Jika produk belum ada, tambahkan ke invoice
                        invoiceItems[id] = {
                            name,
                            price,
                            qty: 1
                        };

                        const li = document.createElement('li');
                        li.classList.add('list-group-item');
                        li.setAttribute('data-id', id);
                        li.innerHTML = `
                    <div class="menu-item" style="display: flex; align-items: center;">
                        <img src="${image}" alt="${name}" style="width:50px; height:50px; object-fit:cover; ">
                        <div class="menu-item-text" style="flex-grow:1;">
                            <h6 style="margin-bottom:1;">${name}</h6>
                            <p style="margin:0;">Rp ${price.toLocaleString()}</p>
                        </div>
                        <div class="quantity-counter" style="display:flex; align-items:center;">
                            <button class="btn-minus">−</button>
                            <span class="qty-number" style="margin: 0 8px;">1</span>
                            <button class="btn-plus">+</button>
                        </div>
                    </div>
                `;
                        invoiceList.appendChild(li);

                        // Mengatur event untuk tombol + dan -
                        li.querySelector('.btn-plus').addEventListener('click', () => {
                            invoiceItems[id].qty += 1;
                            li.querySelector('.qty-number').textContent = invoiceItems[id].qty;
                            updateSubtotal();
                        });

                        li.querySelector('.btn-minus').addEventListener('click', () => {
                            if (invoiceItems[id].qty > 1) {
                                invoiceItems[id].qty -= 1;
                                li.querySelector('.qty-number').textContent = invoiceItems[id].qty;
                            } else {
                                delete invoiceItems[id];
                                li.remove();
                            }
                            updateSubtotal();
                            updateEmptyMessage();
                        });
                    }

                    updateSubtotal();
                    updateEmptyMessage();
                });
            });

            // Fungsi untuk update subtotal
            function updateSubtotal() {
                let subtotal = 0;
                for (let key in invoiceItems) {
                    subtotal += invoiceItems[key].price * invoiceItems[key].qty;
                }
                document.getElementById('subtotal-display').textContent = 'Rp ' + subtotal.toLocaleString();
            }

            // Handle proses pemesanan
            document.getElementById('place-order-btn').addEventListener('click', function(event) {
                event.preventDefault();

                const cash = parseFloat(document.getElementById('cash-input').value);
                if (isNaN(cash) || cash <= 0) {
                    const cashAlertModal = new bootstrap.Modal(document.getElementById('cashAlertModal'));
                    cashAlertModal.show();
                    return;
                }

                const items = [];
                for (let id in invoiceItems) {
                    items.push({
                        product_id: id,
                        qty: invoiceItems[id].qty,
                        price: invoiceItems[id].price,
                        subtotal: invoiceItems[id].price * invoiceItems[id].qty
                    });
                }

                fetch('/kasir/store', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            payment_amount: cash,
                            items: items
                        })
                    })
                    .then(async response => {
                        if (!response.ok) {
                            const errorText = await response.text();
                            throw new Error(errorText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log(data)
                        const receiptUrl = `/receipt/${data.data.id}`;
                        showSuccessModal(receiptUrl);

                        // Reset data kasir
                        invoiceItems = {};
                        invoiceList.innerHTML = '';
                        document.getElementById('cash-input').value = '';
                        document.getElementById('subtotal-display').textContent = 'Rp 0';
                        updateEmptyMessage();
                    })

                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menyimpan transaksi.\n' + error.message);
                    });
            });
        });
    </script>




    <
        </body>

</html>